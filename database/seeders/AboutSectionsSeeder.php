<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSectionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('about_sections')->insert([
            [
                'section_key' => 'mission',
                'title' => 'Our Mission',
                'content' => 'To deliver innovative software solutions that empower businesses globally.',
                'icon' => '🎯',
            ],
            [
                'section_key' => 'vision',
                'title' => 'Our Vision',
                'content' => 'To be recognized as a leading global software development company.',
                'icon' => '👁️',
            ],
        ]);
    }
}
