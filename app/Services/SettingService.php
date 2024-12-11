<?php

namespace App\Services;

use JsonException;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Enums\ResponseTypeEnum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public array $settingsConfigurations;
    protected string $type;
    protected string $subType;
    protected array $errorMessages = [];

    public function __construct()
    {
        $settings = config("settings.configurations");
        $newSettings = [];
        foreach ($settings as $type => $typeSettings) {
            foreach ($typeSettings['sub-settings'] as $subType => $subTypeSettings) {
                $newSettings[$type]['sub-settings'][$subType] = $subTypeSettings;
                foreach ($subTypeSettings as $subSubType => $subSubTypeSettings) {
                    $newSettings[$type]['sub-settings'][$subType][$subSubType] = $subSubTypeSettings;
                    if (isset($subSubTypeSettings['dependent_fields'])) {
                        foreach ($subSubTypeSettings['dependent_fields'] as $dependentFields) {
                            foreach ($dependentFields as $fieldName => $fieldOptions) {
                                $newSettings[$type]['sub-settings'][$subType][$fieldName] = $fieldOptions;
                            }
                        }
                    }
                }
            }
        }

        $this->settingsConfigurations = $newSettings;
    }

    /**
     * @throws JsonException
     */
    public function update(Request $request, string $type, string $subType): array
    {
        $this->type = $type;
        $this->subType = $subType;
        $settingsRequest = $request->settings;
        $uploadAbleImages = [];
        foreach ($settingsRequest as $field => $value) {
            $this->validate($field, $value);
            if (is_array($value)) {
                $settingsRequest[$field] = json_encode($value, JSON_THROW_ON_ERROR);
            } elseif ($value instanceof UploadedFile) {
                $uploadAbleImages[$field] = $value;
            } elseif (
                isset($this->settingsConfigurations[$this->type]['sub-settings'][$this->subType][$field]['encryption']) &&
                $this->settingsConfigurations[$this->type]['sub-settings'][$this->subType][$field]['encryption']
            ) {
                $settingsRequest[$field] = encrypt($value);
            }
        }

        if (!empty($this->errorMessages)) {
            return [
                ResponseTypeEnum::STATUS_KEY->value => false,
                ResponseTypeEnum::MESSAGE_KEY->value => __('Invalid data in field(s).'),
                'errors' => $this->errorMessages,
                'inputs' => $settingsRequest
            ];
        }

        $existingSettingsFromDatabase = Setting::whereIn('name', array_keys($settingsRequest))->get()->toArray();
        $updateAbleSettings = array_diff_assoc($settingsRequest, $existingSettingsFromDatabase);
        if (!empty($uploadAbleImages)) {
            $this->uploadImages($uploadAbleImages, $updateAbleSettings);
        }


        if (!empty($updateAbleSettings)) {
            $updateCount = 0;
            foreach ($updateAbleSettings as $field => $value) {
                $attributes = ['name' => $field, 'value' => $value];
                $conditions = ['name' => $field];
                if ($isUpdate = Setting::updateOrCreate($conditions, $attributes)) {
                    if ($isUpdate->wasRecentlyCreated || $isUpdate->wasChanged()) {
                        $updateCount++;
                    }
                }
            }

            if ($updateCount > 0) {
                $cachedSettings = Cache::get("settings");
                Cache::forget("settings");
                if (!empty($cachedSettings)) {
                    $cachedSettings = array_merge($cachedSettings, $updateAbleSettings);
                } else {
                    $cachedSettings = $updateAbleSettings;
                }
                Cache::forever("settings", $cachedSettings);

                $message = __(':updateCount setting(s) have been updated!', ['updateCount' => $updateCount]);
                return [
                    ResponseTypeEnum::STATUS_KEY->value => true,
                    ResponseTypeEnum::MESSAGE_KEY->value => $message,
                    'errors' => [],
                    'inputs' => []
                ];
            }
        }

        return [
            ResponseTypeEnum::STATUS_KEY->value => false,
            ResponseTypeEnum::MESSAGE_KEY->value => __('There is nothing to be changed!'),
            'errors' => [],
            'inputs' => []
        ];
    }

    protected function validate($field, $value): void
    {
        $fieldConfiguration = $this->settingsConfigurations[$this->type]['sub-settings'][$this->subType][$field];
        if (isset($fieldConfiguration['validation']) && !empty($fieldConfiguration['validation'])) {
            $rules = explode('|', $fieldConfiguration['validation']);
            foreach ($rules as $rule) {
                $this->_validate($field, $value, $rule);
            }
        }
    }

    protected function _validate($field, $value, $rule): void
    {
        switch ($rule) {
            case 'required':
                if ($value === "") {
                    $this->errorMessages[$field][] = __('This field is required.');
                }
                break;
            case 'numeric':
                if (!is_numeric($value)) {
                    $this->errorMessages[$field][] = __('This field must be numeric.');
                }
                break;
            case 'integer':
                if (filter_var($value, FILTER_VALIDATE_INT) === false) {
                    $this->errorMessages[$field][] = __('This field must be integer.');
                }
                break;
            case 'digit':
                if (!ctype_digit($value)) {
                    $this->errorMessages[$field][] = __('This field must be between 0 and 9 digits.');
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errorMessages[$field][] = __('This field must be email.');
                }
                break;
            case 'boolean':
                if (!is_bool($value)) {
                    $this->errorMessages[$field][] = __('This field must be boolean.');
                }
                break;
            case 'image':
                if (
                    !$value instanceof UploadedFile
                    || !in_array($value->clientExtension(), ['png', 'jpg', 'jpeg'])
                ) {
                    $this->errorMessages[$field][] = __('This field must be [png, jpg, jpge].');
                }

                break;
            case 'array':
                if (!is_array($value) || empty($value)) {
                    $this->errorMessages[$field][] = __('This field must be array.');
                }

                break;
            case str_contains($rule, 'size:'):
                $keyValue = explode(':', $rule);
                $imageSize = $value->getSize() / 1024;

                if (!$value instanceof UploadedFile || $imageSize > $keyValue[1]) {
                    $this->errorMessages[$field][] = __('This field may not be greater than :size.', ['size' => $keyValue[1]]);
                }
                break;
            case str_contains($rule, 'min:'):
                $keyValue = explode(':', $rule);

                if (!is_numeric($keyValue[1]) || $value < $keyValue[1]) {
                    $this->errorMessages[$field][] = __('This field must be at least :min.', ['min' => $keyValue[1]]);
                }
                break;
            case str_contains($rule, 'max:'):
                $keyValue = explode(':', $rule);

                if (!is_numeric($keyValue[1]) || $value > $keyValue[1]) {
                    $this->errorMessages[$field][] = __('This field may not be greater than :max.', ['max' => $keyValue[1]]);
                }

                break;
            case str_contains($rule, 'in:'):
                $keyValue = explode(':', $rule);
                $matchValues = function_exists($keyValue[1]) ? array_keys(call_user_func($keyValue[1])) : explode(',', $keyValue[1]);

                if (is_array($value) && !empty(array_diff($value, $matchValues))) {
                    $this->errorMessages[$field][] = __('The selected value is invalid.');
                } elseif (!is_array($value) && !in_array($value, $matchValues, true)) {
                    $this->errorMessages[$field][] = __('The selected value is invalid.');
                }
                break;
            default:
        }
    }

    private function uploadImages($uploadAbleImages, &$updateAbleSettings): void
    {
        $fileUploadService = app(FileUploadService::class);
        foreach ($uploadAbleImages as $field => $file) {
            $filePath = config('commonconfig.path_image');
            $width = $this->settingsConfigurations[$this->type]['sub-settings'][$this->subType][$field]['width'] ?? null;
            $height = $this->settingsConfigurations[$this->type]['sub-settings'][$this->subType][$field]['height'] ?? null;

            $uploadedFileName = $fileUploadService->upload($file, $filePath, $field, '', '', 'public', $width, $height);

            if (empty($uploadedFileName)) {
                unset($updateAbleSettings[$uploadedFileName]);
                continue;
            }

            $updateAbleSettings[$field] = $uploadedFileName;
        }
    }

    public function load($settingGroup = null, $subSettingGroup = null): array
    {
        $this->type = $settingGroup;
        $this->subType = $subSettingGroup;

        $settingGroup = config('settings.configurations.' . $settingGroup);
        $settingSections = [];
        foreach ($this->settingsConfigurations as $key => $value) {
            $settingSections[$key] = [
                'sub-settings' => array_keys($value['sub-settings']),
            ];
        }

        return [
            'fieldsGroup' => $settingGroup['sub-settings'][$subSettingGroup],
            'settingSections' => $settingSections
        ];
    }
}
