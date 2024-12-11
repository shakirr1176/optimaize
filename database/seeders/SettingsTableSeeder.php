<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date_time = date('Y-m-d H:i:s');
        $adminSettingArray = [
            'lang' => 'en',
            'lang_switcher' => true,
            'lang_switcher_item' => 'short_code',
            'registration_active_status' => true,
            'default_role_to_register' => RoleEnum::USER->value,
            'require_email_verification' => true,
            'company_name' => 'Codemen',
            'company_logo' => '',
            'favicon' => '',
            'support_email' => 'info@codemen.org',
            'display_google_captcha' => false,
        ];

        $adminSetting = [];
        foreach ($adminSettingArray as $key => $value) {
            $adminSetting[] = [
                'name' => $key,
                'value' => is_array($value) ? json_encode($value) : $value,
                'created_at' => $date_time,
                'updated_at' => $date_time
            ];
        }
        Setting::insert($adminSetting);

        Cache::set("settings", $adminSettingArray);
    }
}
