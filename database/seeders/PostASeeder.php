<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $posts = [
           [
            'description' => 'Lorem ipsum',
            'active' => true,
            'user_id' => 1
           ],
           [
            'description' => 'Admin user post description',
            'active' => true,
            'user_id' => 1
           ],
           [
            'description' => 'test user post description',
            'active' => true,
            'user_id' => 2
           ],
           [
            'description' => 'Another post',
            'active' => true,
            'user_id' => 2
           ],
           [
            'description' => 'First post from user Test User 2',
            'active' => true,
            'user_id' => 3
           ],
           [
            'description' => 'Another post from user Test User 2',
            'active' => true,
            'user_id' => 3
           ],
           [
            'description' => 'A post from user Test User 3',
            'active' => true,
            'user_id' => 4
           ],
           [
            'description' => 'Another post from user Test User 3',
            'active' => true,
            'user_id' => 4
           ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
