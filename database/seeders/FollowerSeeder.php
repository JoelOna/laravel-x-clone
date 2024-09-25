<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $follows = [
            [
                'user_id' => 1,
                'follower_id' => 2
            ],
            [
                'user_id' => 1,
                'follower_id' => 3
            ],
            [
                'user_id' => 2,
                'follower_id' => 1
            ],
            [
                'user_id' => 2,
                'follower_id' => 4
            ],
            [
                'user_id' => 3,
                'follower_id' => 1
            ],
            [
                'user_id' => 4,
                'follower_id' => 1
            ],
            [
                'user_id' => 4,
                'follower_id' => 2
            ],
            [
                'user_id' => 4,
                'follower_id' => 3
            ],
        ];

        foreach ($follows as $follow) {
            Follow::create($follow);
        }
    }
}
