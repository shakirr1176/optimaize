<?php

use App\Enums\BooleanStatusEnum;
use App\Enums\TicketStatusEnum;
use App\Models\{Language, Notification, Role, Setting, User};
use Illuminate\Support\{Arr, Facades\Auth, Facades\Cache, HtmlString};

if (!function_exists('get_favicon_url')) {
    function get_favicon_url(): string
    {
        $logoPath = 'storage/' . config('commonconfig.path_image');
        $companyLogo = settings('favicon');
        $avatar = valid_image($logoPath, $companyLogo) ? $logoPath . $companyLogo : $logoPath . 'favicon.png';
        return asset($avatar);
    }
}

if (!function_exists('get_logo_url')) {
    function get_logo_url(): string
    {
        $logoPath = 'storage/' . config('commonconfig.path_image');
        $companyLogo = settings('company_logo');
        $avatar = valid_image($logoPath, $companyLogo) ? $logoPath . $companyLogo : $logoPath . 'logo.png';
        return asset($avatar);
    }
}

if (!function_exists('get_logo_small_url')) {
    function get_logo_small_url(): string
    {
        $logoPath = 'storage/' . config('commonconfig.path_image');
        $companyLogo = settings('company_logo_icon');
        $avatar = valid_image($logoPath, $companyLogo) ? $logoPath . $companyLogo : $logoPath . 'logo-sm.png';
        return asset($avatar);
    }
}

if (!function_exists('random_string')) {

    /**
     * @throws Exception
     */
    function random_string($length = 10, $characters = null): string
    {
        if ($characters === null) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        }
        $output = '';
        for ($i = 0; $i < $length; $i++) {
            $y = random_int(0, strlen($characters) - 1);
            $output .= $characters[$y];
        }
        return $output;
    }
}

if (!function_exists('settings')) {
    function settings($field = null, $default = null, $database = false)
    {
        if ($database) {
            $arrayConfig = null;
            if (is_null($field)) {
                $adminSettings = Setting::pluck('value', 'name')->toArray();
                foreach ($adminSettings as $key => $val) {
                    if (is_json($val)) {
                        $arrayConfig[$key] = json_decode($val, true);
                    } else {
                        $arrayConfig[$key] = $val;
                    }
                }
            } else if (is_array($field) && count($field) > 0) {
                $arrayConfig = Setting::whereIn('name', $field)->pluck('value', 'name')->toArray();
            } else {
                $arrayConfig = Setting::where('name', $field)->value('value') ?: $default;
            }
            return $arrayConfig;
        }

        $arrayConfig = Cache::get('settings');
        if (is_array($arrayConfig)) {
            if ($field !== null) {
                if (is_array($field) && count($field) > 0) {
                    $fieldValues = Arr::only($arrayConfig, $field);
                    return array_map("_getValues", $fieldValues);
                }

                if (is_string($field) && isset($arrayConfig[$field])) {
                    return _getValues($arrayConfig[$field]);
                }

                return $default;
            }

            return array_map("_getValues", $arrayConfig);
        }
        return false;
    }
}

if (!function_exists('_getValues')) {
    function _getValues($value)
    {
        try {
            $fieldValue = decrypt($value);
        } catch (Exception) {
            $fieldValue = $value;
        }

        return $fieldValue;
    }
}

if (!function_exists('check_language')) {
    function check_language($language)
    {
        $languages = language();
        if (array_key_exists($language, $languages)) {
            return $language;
        }
        return null;
    }
}

if (!function_exists('set_language')) {
    function set_language(): bool
    {
        $languages = language();
        if (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'], $languages) && check_language($_COOKIE['lang']) !== null) {
            $language = $_COOKIE['lang'];
        } else {
            $language = settings('lang', config('app.fallback_locale'));
            if ($language !== false && array_key_exists($language, $languages)) {
                setcookie("lang", $language, time() + (86400 * 30), '/');
            }
        }

        App()->setlocale($language);
        return true;
    }
}

if (!function_exists('language')) {
    function language($language = null)
    {
        $languages = Cache::get('languages', []);

        if (empty($languages)) {
            try {
                $conditions = ['is_active' => BooleanStatusEnum::ACTIVE->value];
                $langs = Language::where($conditions)->get();
                foreach ($langs as $lang) {
                    $languages[$lang->short_code] = [
                        'name' => $lang->name,
                        'icon' => $lang->icon,
                        'is_rtl' => $lang->is_rtl,
                    ];
                }
            } catch (Exception) {
                $languages = [];
            }
            Cache::set('languages', $languages);
        }

        return is_null($language) ? $languages : $languages[$language];
    }
}

if (!function_exists('language_short_code_list')) {
    function language_short_code_list($language = null): array|int|string
    {
        $languages = array_keys(language());

        return is_null($language) ? array_combine($languages, $languages) : $languages[$language];
    }
}

if (!function_exists('build_permission')) {
    function build_permission($permissionGroups, $roleSlug = null): array
    {
        $configPath = 'permissions';

        $routeConfig = config($configPath);
        $allAccessibleRoutes = [];
        foreach ($permissionGroups as $permissionGroupName => $permissionGroup) {
            foreach ($permissionGroup as $groupName => $groupAccessName) {
                foreach ($groupAccessName as $accessName) {
                    try {
                        $routes = $routeConfig["configurable_routes"][$permissionGroupName][$groupName][$accessName];
                        $allAccessibleRoutes[] = $routes;
                    } catch (Exception) {
                    }
                }
            }
        }
        $allAccessibleRoutes[] = $routeConfig['global_routes'];
        $allAccessibleRoutes = array_merge(...$allAccessibleRoutes);

        if ($roleSlug) {
            Cache::forget("roles_$roleSlug");
            Cache::forever("roles_$roleSlug", $allAccessibleRoutes);
        }

        return $allAccessibleRoutes;
    }
}

if (!function_exists('has_permissions')) {
    /**
     * @throws JsonException
     */
    function has_permissions(array $routeNames): bool
    {
        $hasPermission = false;
        foreach ($routeNames as $routeName) {
            if (has_permission($routeName)) {
                $hasPermission = true;
                break;
            }
        }
        return $hasPermission;
    }
}

if (!function_exists('has_permission')) {
    /**
     * @throws JsonException
     */
    function has_permission($routeName, $userId = null, $is_link = true): bool|string
    {
        $isAccessible = $is_link ? false : 401;
        if (is_null($userId)) {
            $user = Auth::user();
        } else {
            $user = User::find($userId);
        }

        if ($user === null) {
            return $isAccessible;
        }

        $routeConfig = config('permissions');
        if ($user->email === config('app.system-admin')) {
            $otherUsersRoutes = $routeConfig['role_based_routes'];
            unset($otherUsersRoutes[$user->assigned_role]);
            if (in_array($routeName, Arr::flatten($otherUsersRoutes), true)) {
                return $isAccessible;
            }
            return true;
        }

        $allAccessibleRoutes = Cache::rememberForever("roles_$user->assigned_role", static function () use ($user) {
            return $user->role->accessible_routes;
        });

        if (isset($routeConfig["role_based_routes"][$user->assigned_role])) {
            $assignedRoutes = [];
            $rolebasedRoutes = $routeConfig["role_based_routes"][$user->assigned_role];
            foreach ($rolebasedRoutes as $rolebasedRoute) {
                foreach ($rolebasedRoute as $routes) {
                    $assignedRoutes[] = $routes;
                }
            }
            $allAccessibleRoutes = array_merge($allAccessibleRoutes, ...$assignedRoutes);
        }

        if (in_array($routeName, $routeConfig['global_routes'], true)) {
            $isAccessible = true;
        } else if (!empty($allAccessibleRoutes) && in_array($routeName, $allAccessibleRoutes, true)) {
            if (in_array($routeName, $routeConfig['avoidable_unverified_routes'], true)) {
                $isAccessible = true;
            } elseif (in_array($routeName, $routeConfig['avoidable_suspended_routes'], true)) {
                $isAccessible = true;
            }elseif (
                $user->is_active &&
                ($user->email_verified_at ||
                    !settings('require_email_verification')
                )
            ) {
                $isAccessible = true;
            } else if (
                !$user->email_verified_at &&
                settings('require_email_verification')
            ) {
                $isAccessible = $is_link ? false : 'email_unverified';
            } elseif (!$user->is_active) {
                $isAccessible = $is_link ? false : 'account_suspended';
            }
        }
        return $isAccessible;
    }
}

if (!function_exists('is_json')) {
    function is_json($string): bool
    {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() === JSON_ERROR_NONE);
    }
}

if (!function_exists('get_query_param')) {
    function get_query_param($key, $val = '')
    {
        $output = '';
        if (isset($_GET[$key]) && $val !== '') {
            if ($_GET[$key] === (string)$val) {
                $output = ' selected';
            }
        } elseif (isset($_GET[$key]) && $val === '') {
            if (!is_array($_GET[$key])) {
                $output = $_GET[$key];
            }
        }
        return $output;
    }
}

if (!function_exists('get_image_placeholder')) {
    function get_image_placeholder($width, $height, $fontSize = 40, $label = null): string
    {
        if (is_null($label)) {
            $label = "{$width}×$height";
        }

        $svg = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"$width\" height=\"$height\" viewBox=\"0 0 $width $height\">
            <rect fill=\"#e4e5e7\" width=\"$width\" height=\"$height\"/>
            <text fill=\"rgba(0,0,0,0.35)\" font-family=\"sans-serif\" font-size=\"$fontSize\" dy=\"4.5\" font-weight=\"bold\" x=\"50%\" y=\"50%\" dominant-baseline=\"middle\" text-anchor=\"middle\">
                $label
            </text>
        </svg>";

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }
}

if (!function_exists('valid_image')) {
    function valid_image($imagePath, $image): bool
    {
        $extension = explode('.', $image);
        $isExtensionAvailable = in_array(end($extension), config('commonconfig.image_extensions'), true);

        return $isExtensionAvailable && file_exists(public_path($imagePath . $image));
    }
}

if (!function_exists('get_avatar')) {
    function get_avatar($avatar): string
    {
        $avatarPath = 'storage/' . config('commonconfig.path_profile_image');

        $avatar = valid_image($avatarPath, $avatar) ? $avatarPath . $avatar : $avatarPath . 'avatar.jpg';

        return asset($avatar);
    }
}

if (!function_exists('get_user_notifications')) {
    function get_user_notifications($userId = null): array
    {
        if (is_null($userId)) {
            $userId = Auth::id();
        }

        return [
            'list' => Notification::where('user_id', $userId)->unread()->latest('id')->take(5)->get(),
            'count_unread' => Notification::where('user_id', $userId)->unread()->count()
        ];
    }
}

if (!function_exists('get_user_roles')) {
    function get_user_roles()
    {
        return Role::where('is_active', BooleanStatusEnum::ACTIVE->value)->pluck('name', 'slug')->toArray();
    }
}

if (!function_exists('get_language_icon')) {
    function get_language_icon($icon): string
    {
        $languagePath = 'storage/' . config('commonconfig.language_icon');
        if (valid_image($languagePath, $icon)) {
            return asset($languagePath . $icon);
        }

        return asset($languagePath . 'en-flag.png');
    }
}

if (!function_exists('format_date')) {
    function format_date($date, $formet = 'Y-m-d')
    {
        if (is_string($date)) {
            return $date;
        }

        return $date->format($formet);
    }
}


if (!function_exists('get_language_direction')) {
    function get_language_direction($input = null)
    {
        $output = [
            0 => __('LTR'),
            1 => __('RTL'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('get_heroicon_name')) {
    function get_heroicon_name($name)
    {
        $output = [
            'exclamation-triangle' => 'heroicon-m-exclamation-triangle',
            'info-circle' => 'heroicon-m-information-circle',
        ];
        return array_key_exists($name, $output) ? $output[$name] : $name;
    }
}

if (!function_exists('datatable_downloadable_type')) {
    function datatable_downloadable_type($input = null): array
    {
        $output = [
            'dompdf' => [
                'extension' => 'pdf',
                'label' => __('Download as PDF'),
                'icon' => 'heroicon-o-document-arrow-down'
            ],
            'csv' => [
                'extension' => 'csv',
                'label' => __('Download as CSV'),
                'icon' => 'heroicon-o-table-cells'
            ]
        ];
        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('language_switcher_items')) {
    function language_switcher_items($input = null)
    {
        $output = [
            'name' => __('Name'),
            'short_code' => __('Short Code'),
            'icon' => __('Icon')
        ];
        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('display_ticket_status')) {
    function display_ticket_status($status): HtmlString
    {
        if ($status == TicketStatusEnum::OPEN->value) {
            return new HtmlString('<span class="text-info">' . __("Open") . '</span>');
        } elseif ($status == TicketStatusEnum::RESOLVED->value) {
            return new HtmlString('<span class="text-primary">' . __("Resolved") . '</span>');
        } else {
            return new HtmlString('<span class="text-danger">' . __("Closed") . '</span>');
        }
    }
}


if (!function_exists('active_status')) {
    function active_status($input = null)
    {
        $output = BooleanStatusEnum::getLabels();

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('display_active_status')) {
    function display_active_status($status): HtmlString
    {
        if ($status == BooleanStatusEnum::ACTIVE->value) {
            return new HtmlString('<span class="text-info">' . __("Active") . '</span>');
        }

        return new HtmlString('<span class="text-danger">' . __("Inactive") . '</span>');
    }
}

if (!function_exists('display_announcement_status')) {
    function display_announcement_status($status): HtmlString
    {
        if ($status) {
            return new HtmlString('<span class="text-success">' . __("Published") . '</span>');
        }
        return new HtmlString('<span class="text-info">' . __("Draft") . '</span>');

    }
}

if (!function_exists('display_language_flag')) {
    function display_language_flag($icon): HtmlString
    {
        return new HtmlString('<img class="w-6 h-7" src="' . get_language_icon($icon) . '">');
    }
}

if (!function_exists('display_language_direction')) {
    function display_language_direction($isRtl): HtmlString
    {
        if ($isRtl) {
            return new HtmlString('<span class="text-info">' . __("Yes") . '</span>');
        }

        return new HtmlString('<span class="text-primary">' . __("No") . '</span>');
    }
}

if (!function_exists('display_notification_status')) {
    function display_notification_status($readAt): HtmlString
    {
        if ($readAt) {
            return new HtmlString('<span class="text-info">' . __("Read") . '</span>');
        }

        return new HtmlString('<span class="text-danger">' . __("Unread") . '</span>');
    }
}

if (!function_exists('email_status')) {
    function email_status($input = null)
    {
        return $input ? __('Verified') : __('Unverified');
    }
}

if (!function_exists('display_user_status')) {
    function display_user_status($status): HtmlString
    {
        if ($status == BooleanStatusEnum::ACTIVE->value) {
            return new HtmlString('<span class="text-info">' . __("Active") . '</span>');
        }

        return new HtmlString('<span class="text-danger">' . __("Inactive") . '</span>');
    }
}

if (!function_exists('get_settings_name')) {
    function get_settings_name($name): string
    {
        return 'settings[' . $name . ']';
    }
}

if (!function_exists('generate_filter_url')) {
    function generate_filter_url($params, $value = ""): string
    {
        if (empty($params)) {
            return url()->current();
        }

        $queryParams = request()?->except($params);
        if (is_array($params)) {
            $queryParams = array_merge($queryParams, $params);
        } else {
            $queryParams[$params] = $value;
        }

        return sprintf("%s?%s", url()->current(), http_build_query($queryParams));
    }
}

if (!function_exists('dynamic_comparison')) {
    function dynamic_comparison($item1, $operator, $item2): bool
    {
        return match ($operator) {
            '==' => $item1 === $item2,
            '!=' => $item1 !== $item2,
            '>' => $item1 > $item2,
            '<' => $item1 < $item2,
            '>=' => $item1 >= $item2,
            '<=' => $item1 <= $item2,
            default => true,
        };
    }
}

if (!function_exists('isLinkShowable')) {
    function isLinkShowable($item, array $conditions): bool
    {
        $isTrue = false;
        foreach ($conditions as $condition) {
            if (count($condition) === 2) {
                $isTrue = $item->{$condition[0]} === $condition[1];
            } elseif (count($condition) === 3) {
                $isTrue = dynamic_comparison($item->{$condition[0]}, $condition[1], $condition[2]);
            } elseif (count($condition) === 4) {
                if ($condition[3] === 'or' && $isTrue) {
                    break;
                }

                $isTrue = dynamic_comparison($item->{$condition[0]}, $condition[1], $condition[2]);
                if ($condition[3] === 'or' && $isTrue) {
                    break;
                }
            }

            if (!$isTrue) {
                break;
            }
        }

        return $isTrue;
    }
}
