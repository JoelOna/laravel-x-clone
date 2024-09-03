<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function index(){
        // $posts =  Post::getUserFollowingPosts();
        $user_id = Auth::id();
        $following_users = Follow::select('follower_id')->where(['user_id' => $user_id])->get();
        $posts = Post::whereIn('user_id',$following_users)->orderBy('created_at')->limit(20)->get();
        return view('home')->with(['posts' => $posts]);
     }
}
