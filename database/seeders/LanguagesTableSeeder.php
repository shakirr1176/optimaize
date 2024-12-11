<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inputs = [
            [
                'name' => 'English',
                'short_code' => 'en',
                "icon" => "en-flag.png",
                'is_rtl' => false,
            ],
            [
                'name' => 'Portuguese',
                'short_code' => 'pt',
                "icon" => "pt-flag.png",
                'is_rtl' => false,
            ],
        ];

        $languages = [];
        foreach ($inputs as $input) {
            $languages[$input['short_code']] = [
                'name' => $input['name'],
                'icon' => $input['icon'],
                'is_rtl' => $input['is_rtl'],
            ];
        }

        Cache::set('languages', $languages);

        Language::insert($inputs);
    }
}
