<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $comments = [
            [
                'user_id' => 1,
                'post_id' => 1,
                'comment' => 'First comment of this post!'
            ],
            [
                'user_id' => 3,
                'post_id' => 1,
                'comment' => 'Awsome!'
            ],
            [
                'user_id' => 2,
                'post_id' => 2,
                'comment' => 'Amazing info!'
            ],
            [
                'user_id' => 4,
                'post_id' => 2,
                'comment' => 'First comment of this post!'
            ],
            [
                'user_id' => 1,
                'post_id' => 3,
                'comment' => 'Lorem ipsum comment'
            ],
            [
                'user_id' => 2,
                'post_id' => 3,
                'comment' => 'This is my second comment in this social media!'
            ],
            [
                'user_id' => 3,
                'post_id' => 3,
                'comment' => 'Amazin people!'
            ],
            [
                'user_id' => 4,
                'post_id' => 4,
                'comment' => 'Good work!'
            ],   
            [
                'user_id' => 1,
                'post_id' => 5,
                'comment' => 'Wow!'
            ],
            [
                'user_id' => 3,
                'post_id' => 5,
                'comment' => 'Cool!'
            ],
            [
                'user_id' => 2,
                'post_id' => 6,
                'comment' => 'Nice one!'
            ],
            [
                'user_id' => 4,
                'post_id' => 7,
                'comment' => 'What a job!'
            ],
            [
                'user_id' => 4,
                'post_id' => 8,
                'comment' => 'First comment of this post!'
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
