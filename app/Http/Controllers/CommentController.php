<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index($post_id){
        $comments = Comment::where(['post_id'=>$post_id])->paginate(10);
        foreach ($comments as $comment) {
            $comment->user = $comment->user;
        }
        return $comments;
    }

    public function store(CommentRequest $request){
        $validated = $request->validated();
        $comment = Comment::create($validated);
        return $comment;
    }

}
