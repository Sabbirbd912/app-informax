<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (blank($email) || blank($password)) {
            throw new RuntimeException('Set ADMIN_EMAIL and ADMIN_PASSWORD in your local .env file before seeding the admin user.');
        }

        $user = \App\Models\User::firstOrNew(['email' => $email]);
        $user->name = env('ADMIN_NAME', 'Admin');
        $user->password = Hash::make($password);
        $user->role = 'admin';
        $user->save();
    }
}
