<?php

namespace App\Services;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use JsonException;

class LanguageService
{
    private Filesystem $disk;
    private string $languageFilesPath;
    private array $lookupPaths;
    private array $translations = [];

    public function __construct(Filesystem $disk, string $languageFilesPath, array $lookupPaths)
    {
        $this->disk = $disk;
        $this->languageFilesPath = $languageFilesPath;
        $this->lookupPaths = $lookupPaths;
    }

    /**
     * @throws JsonException
     */
    public function addLanguage($language): void
    {
        file_put_contents(
            $this->languageFilesPath . DIRECTORY_SEPARATOR . "$language.json",
            json_encode((object)[], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        );
        $this->sync();
    }

    /**
     * Synchronize the language keys from files.
     * @return array
     * @throws JsonException
     */
    public function sync(): array
    {
        $output = [];

        $translations = $this->getTranslations();

        $keysFromFiles = Arr::collapse($this->getTranslationsFromFiles());

        $allRoutes = Route::getRoutes()->getRoutesByMethod()['GET'];
        foreach ($allRoutes as $routeData) {
            if (is_null($routeData->getName())) {
                continue;
            }
            $middleware = $routeData->middleware();
            if (is_array($middleware) && count(array_intersect($middleware, ['permission', 'guest.permission', 'verification.permission']))) {
                $uri = explode('/', $routeData->uri);
                foreach ($uri as $uriPart) {
                    if ($uriPart[0] !== '{') {
                        $uriPart = __(Str::title(preg_replace('/[-_]+/', ' ', $uriPart)));
                        if ($uriPart !== '' && !in_array($uriPart, $keysFromFiles, true)) {
                            $keysFromFiles[] = $uriPart;
                        }
                    }
                }
            }
        }

        $settingLabels = [];
        foreach (config('settings.configurations') as $settingTitle => $settingData) {
            $keysFromFiles[] = ucwords(preg_replace('/[-_]+/', ' ', $settingTitle));
            foreach ($settingData['sub-settings'] as $settingSubTitle => $settingMainData) {
                $keysFromFiles[] = ucwords(preg_replace('/[-_]+/', ' ', $settingSubTitle));
                $settingLabels[] = array_column($settingMainData, 'field_label');
                $dependentColumns = array_column($settingMainData, 'dependent_fields');
                if (!empty($dependentColumns)) {
                    foreach ($dependentColumns as $dependentColumn) {
                        foreach ($dependentColumn as $column) {
                            $settingLabels[] = array_column($column, 'field_label');
                        }
                    }
                }
            }
        }

        $keysFromFiles = array_merge($keysFromFiles, ...$settingLabels);
        foreach (config('permissions.configurable_routes') as $appSettingTitle => $appSettingData) {
            $keysFromFiles[] = Str::title(str_replace('_', ' ', $appSettingTitle));
            foreach ($appSettingData as $appSettingSubTitle => $appSettingSubData) {
                $keysFromFiles[] = Str::title(str_replace('_', ' ', $appSettingSubTitle));
                foreach ($appSettingSubData as $appSettingGroupTitle => $appSettingGroupData) {
                    $keysFromFiles[] = Str::title(str_replace('_', ' ', $appSettingGroupTitle));
                }
            }
        }

        $navConfig = config('navigation', []);
        array_walk_recursive($navConfig, function ($value, $key) use(&$keysFromFiles) {
            if($key === "title"){
                $keysFromFiles[] = $value;
            }
        });

        foreach (array_unique($keysFromFiles) as $key) {
            foreach ($translations as $lang => $keys) {
                if (!array_key_exists($key, $keys)) {
                    $output[] = $key;
                    $translations[$lang][$key] = $key;
                }
            }
        }

        collect($this->disk->allFiles($this->languageFilesPath))
            ->filter(function ($file) {
                return $this->disk->extension($file) === 'php';
            })
            ->each(function ($file) use (&$translations, &$output) {
                $prefix = str_replace('.php', '.', $file->getFilename());
                $transArray = $this->flatten(include $file->getRealPath(), $prefix);
                foreach ($transArray as $key => $value) {
                    foreach ($translations as $lang => $keys) {
                        if (!array_key_exists($key, $keys)) {
                            $output[] = $key;
                            $translations[$lang][$key] = $value;
                        }
                    }
                }
            });

        $output = array_values(array_unique($output));
        if (!empty($output)) {
            $this->saveTranslations($translations);
        }

        return [
            'type' => 'success',
            'message' => __('Sync completed. Newly :add keys added.', ['add' => count($output)]),
            'translations' => $this->getTranslations(true),
        ];
    }

    private function flatten($array, $prefix = '')
    {
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = $result + self::flatten($value, $prefix . $key . '.');
            } else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }

    public function getTranslations($reload = false): array
    {
        if ($this->translations && !$reload) {
            return $this->translations;
        }

        collect($this->disk->allFiles($this->languageFilesPath))
            ->filter(function ($file) {
                return $this->disk->extension($file) === 'json';
            })->each(function ($file) {
                $this->translations[str_replace('.json', '', $file->getFilename())]
                    = json_decode($file->getContents(), true);
            });


        return $this->translations;
    }

    private function getTranslationsFromFiles(): array
    {
        $functions = ['__'];

        $pattern =
            // See https://regex101.com/r/jS5fX0/5
            '[^\w]' . // Must not start with any alphanum or _
            '(?<!->)' . // Must not start with ->
            '(' . implode(',', $functions) . ')' . // Must start with one of the functions
            "\(" . // Match opening parentheses
            "[\'\"]" . // Match " or '
            '(' . // Start a new group to match:
            '.+' . // Must start with group
            ')' . // Close group
            "[\'\"]" . // Closing quote
            "[\),]"  // Close parentheses or new parameter
        ;

        $allMatches = [];

        foreach ($this->lookupPaths as $path) {
            foreach ($this->disk->allFiles($path) as $file) {
                if (preg_match_all("/$pattern/siU", $file->getContents(), $matches)) {
                    $allMatches[$file->getRelativePathname()] = $matches[2];
                }
            }
        }

        return $allMatches;
    }

    /**
     * @throws JsonException
     */
    public function saveTranslations($translations): void
    {
        foreach ($translations as $lang => $lines) {
            $filename = $this->languageFilesPath . DIRECTORY_SEPARATOR . "$lang.json";
            ksort($lines);
            $this->translations[$lang] = $lines;
            file_put_contents($filename, json_encode($lines, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }
    }

    public function rename($oldName, $newName): bool
    {
        $oldFilePath = $this->languageFilesPath . DIRECTORY_SEPARATOR . "$oldName.json";
        $newFilePath = $this->languageFilesPath . DIRECTORY_SEPARATOR . "$newName.json";
        return rename($oldFilePath, $newFilePath);
    }

    public function delete($language): bool
    {
        $filePath = $this->languageFilesPath . DIRECTORY_SEPARATOR . "$language.json";
        return unlink($filePath);
    }
}
