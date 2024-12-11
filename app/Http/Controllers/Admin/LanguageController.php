<?php

namespace App\Http\Controllers\Admin;

use Exception;
use RuntimeException;
use App\Models\Language;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Enums\ResponseTypeEnum;
use App\Enums\BooleanStatusEnum;
use App\Services\LanguageService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LanguageRequest;
use Illuminate\Support\{Facades\Cache, Facades\DB};
use App\Services\{DataTableService, FileUploadService};

class LanguageController extends Controller
{
    public LanguageService $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index(): View
    {
        $dataTableFields = [
            [
                'label' => __('ID'),
                'field_name' => 'id',
                'downloadable' => true,
                'visibility' => false,
            ],
            [
                'label' => __('Name'),
                'field_name' => 'name',
                'sortable' => true,
                'searchable' => true,
                'downloadable' => true,
            ],
            [
                'label' => __('Short Code'),
                'field_name' => 'short_code',
                'sortable' => true,
                'searchable' => true,
                'downloadable' => true,
            ],
            [
                'label' => __('Icon'),
                'field_name' => 'icon',
                'display_callable_function' => [
                    'name' => 'display_language_flag'
                ],
            ],
            [
                'label' => __('RTL'),
                'field_name' => 'is_rtl',
                'data_class' => 'uppercase',
                'display_callable_function' => [
                    'name' => 'display_language_direction'
                ],
                'sortable' => true,
                'searchable' => true,
                'downloadable' => true,
            ],
            [
                'label' => __('Status'),
                'field_name' => 'is_active',
                'label_class' => 'text-center',
                'data_class' => 'capitalize text-center',
                'display_callable_function' => [
                    'name' => 'display_active_status'
                ],
                'downloadable' => true,
                'filterable' => true,
                'filter_data' => BooleanStatusEnum::getLabels(),
            ],
        ];

        $dataTableFilterButtons = [
            [
                'name' => __('Add New'),
                'has_permission' => has_permission('admin.languages.store'),
                'btn_class' => 'font-semibold dark:bg-primary bg-white addModalButton'
            ]
        ];

        $dataTableActionLinks = [
            [
                'name' => 'heroicon-s-pencil',
                'tooltip' => __('Edit'),
                'route_name' => 'admin.languages.edit',
                'link_class' => 'editModalButton dark:bg-black-30 dark:bg-opacity-20 bg-white border dark:border-none hover:bg-lara-gray-200 dark:hover:bg-lara-gray-200 hover:text-white',
            ],
            [
                'name' => 'heroicon-s-trash',
                'tooltip' => __('Delete'),
                'route_name' => 'admin.languages.destroy',
                'link_class' => 'bg-danger hover:bg-red-600 hover:text-white',
                'confirmation' => true,
                'confirmation_data' => [
                    'title' => __('Are you sure?'),
                    'method' => 'DELETE',
                ],
            ],
        ];


        $queryBuilder = Language::orderBy('created_at', 'desc');
        $data['languages'] = app(DataTableService::class)
            ->withFields($dataTableFields)
            ->withFilterButtons($dataTableFilterButtons)
            ->withActionLinks($dataTableActionLinks)
            ->create($queryBuilder);
        $data['booleanStatus'] = BooleanStatusEnum::getLabels();
        $data['title'] = __('Languages');

        return view('admin.languages.index', $data);
    }

    public function store(LanguageRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $params = $request->only(['name', 'short_code', 'is_rtl']);
            if ($request->hasFile('icon')) {
                $filePath = config('commonconfig.language_icon');
                $fileName = $params['short_code'];
                $params['icon'] = app(FileUploadService::class)
                    ->upload($request->file('icon'), $filePath, $fileName, '', '', 'public', 120, 80);
            }

            $language = Language::create($params);
            if (!$language) {
                throw new RuntimeException(__('Failed to create language.'));
            }

            $this->languageService->addLanguage($params['short_code']);
            $this->cache($language);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            logs()->error($e);
            return $this->sendJsonErrorResponse($e->getMessage());
        }

        return $this->sendJsonSuccessResponse(__('Language has been created successfully.'));
    }

    private function cache(Language $language): void
    {
        $languages = Cache::get('languages');

        $languages[$language->short_code] = [
            'name' => $language->name,
            'icon' => $language->icon,
            'is_rtl' => $language->is_rtl,
        ];

        Cache::set('languages', $languages);
    }

    public function edit(Language $language): JsonResponse
    {
        return $this->sendJsonSuccessResponse('', $language);
    }

    public function update(LanguageRequest $request, Language $language): JsonResponse
    {
        DB::beginTransaction();
        try {
            $params = $request->only(['name', 'short_code', 'is_active', 'is_rtl']);

            if ($language->short_code === settings('lang')) {
                $params['is_active'] = BooleanStatusEnum::ACTIVE->value;
            }

            if ($params['short_code'] !== $language->short_code) {
                $isRenamed = $this->languageService->rename($language->short_code, $params['short_code']);
                if (!$isRenamed) {
                    throw new RuntimeException(__('Failed to rename file.'));
                }
            }

            if ($request->hasFile('icon')) {
                $filePath = config('commonconfig.language_icon');
                $fileName = $params['short_code'];
                $params['icon'] = app(FileUploadService::class)
                    ->upload($request->file('icon'), $filePath, $fileName, '', '', 'public', 120, 80);
            }

            $language->update($params);
            $this->cache($language->fresh());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            logs()->error($e);
            return $this->sendJsonErrorResponse($e->getMessage());
        }

        return $this->sendJsonSuccessResponse(__('Language [:lang] has been updated successfully.', ['lang' => $params['short_code']]));
    }

    public function destroy(Language $language): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if ($language->short_code === settings('lang')) {
                throw new RuntimeException(__('Default language cannot be deleted.'));
            }

            $languages = Cache::get('languages');
            unset($languages[$language->short_code]);
            Cache::set('languages', $languages);
            $language->delete();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->route('admin.languages.index')
                ->with(ResponseTypeEnum::ERROR->value, $exception->getMessage());
        }

        DB::commit();
        return redirect()
            ->route('admin.languages.index')
            ->with(ResponseTypeEnum::SUCCESS->value, __('Language [:lang] has been deleted successfully.', ['lang' => $language->short_code]));
    }

    public function settings(): View
    {
        $data['title'] = __('Language Settings');
        return view('admin.languages.settings', $data);
    }

    public function getTranslation(): JsonResponse
    {
        $translations = $this->languageService->getTranslations();
        return response()->json($translations);
    }

    public function settingsUpdate(Request $request): JsonResponse
    {
        $this->languageService->saveTranslations($request->translations);
        return response()->json(['type' => 'success', 'message' => __('Saved successfully.')]);
    }

    public function sync(): JsonResponse
    {
        $response = $this->languageService->sync();
        return response()->json($response);
    }
}
