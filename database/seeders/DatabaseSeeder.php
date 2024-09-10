<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => 'admin',
                'user_bio' => 'user_bio',
                'user_name_x' => 'admin_user',
                'user_location' => 'Barcelona'
            ],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'test',
                'user_bio' => 'user bio test',
                'user_name_x' => 'test_user',
                'user_location' => 'Barcelona'
            ],
            [
                'name' => 'Test User 2',
                'email' => 'test2@example.com',
                'password' => 'test',
                'user_bio' => 'user bio test 2',
                'user_name_x' => 'test2_user',
                'user_location' => 'Madrid'
            ],
            [
                'name' => 'Test User 3',
                'email' => 'test3@example.com',
                'password' => 'test',
                'user_bio' => 'user bio test 3',
                'user_name_x' => 'test3_user',
                'user_location' => 'Madrid'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
