<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

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
        if (Auth::check()) {
            $comment = Comment::create($validated);
            return $comment;
        }
       return response()->json(['message' => 'You have to be logged!'],403);
    }

    public function totalComments ($post_id) {
        return Comment::where(['post_id' => $post_id])->count();
    }

}
