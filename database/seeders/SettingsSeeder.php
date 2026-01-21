<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'Informax Technology Limited', 'type' => 'text'],
            ['key' => 'company_logo', 'value' => 'logos/informax.png', 'type' => 'image'],
            ['key' => 'footer_intro', 'value' => 'Leading software development company delivering innovative solutions from Bangladesh to the world', 'type' => 'textarea'],
            ['key' => 'footer_text', 'value' => '© 2025 Informax Technology Limited. All rights reserved.', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@informax-bd.com', 'type' => 'text'],
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
