<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $likes = [
            [
                'user_id' => 1,
                'post_id' => 1
            ],
            [
                'user_id' => 2,
                'post_id' => 1
            ],
            [
                'user_id' => 3,
                'post_id' => 1
            ],
            [
                'user_id' => 1,
                'post_id' => 2
            ],
            [
                'user_id' => 4,
                'post_id' => 1
            ],
            [
                'user_id' => 2,
                'post_id' => 3
            ],
            [
                'user_id' => 4,
                'post_id' => 4
            ],
            [
                'user_id' => 1,
                'post_id' => 5
            ],
            [
                'user_id' => 3,
                'post_id' => 5
            ],
            [
                'user_id' => 2,
                'post_id' => 6
            ],
            [
                'user_id' => 4,
                'post_id' => 6
            ],
            [
                'user_id' => 1,
                'post_id' => 7
            ],
            [
                'user_id' => 3,
                'post_id' => 7
            ],
            [
                'user_id' => 2,
                'post_id' => 6
            ],
        ];

        foreach ($likes as $like) {
            Like::create($like);
        }
    }
}
