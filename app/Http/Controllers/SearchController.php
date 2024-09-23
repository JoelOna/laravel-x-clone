<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(){
        $users = User::limit(5)->get();
        $posts = Post::limit(5)->get();
        $comments = Comment::limit(5)->get();
        
        foreach ($posts as $post) {
            $post->user = $post->user;
        }
        foreach ($comments as $comment) {
            $comment->user = $comment->user;
        }
        
        return view('search')->with(compact('users','posts','comments'));
    }
    public function search($param){
        $users = User::where('user_name_x','like','%'.$param.'%')->get();
        $posts = Post::where('description','like','%'. $param . '%')->get();
        $comments = Comment::where('comment','like','%'. $param . '%')->get();
        
        foreach ($posts as $post) {
            $post->user = $post->user;
        }
        foreach ($comments as $comment) {
            $comment->user = $comment->user;
        }
        
        $result = json_encode(['users' => $users,'posts' => $posts, 'comments' => $comments]);

        return $result;
    }
}
