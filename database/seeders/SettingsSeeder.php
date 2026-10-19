<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'SoftPolli', 'type' => 'text'],
            ['key' => 'company_logo', 'value' => '', 'type' => 'image'],
            ['key' => 'footer_intro', 'value' => 'Leading software development company delivering innovative solutions from Bangladesh to the world', 'type' => 'textarea'],
            ['key' => 'footer_text', 'value' => '© 2025 SoftPolli. All rights reserved.', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => '', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '+880711065316', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Dhaka, Bangladesh', 'type' => 'textarea'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
