<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        $user = Auth::getUser();
        $posts = Post::where(['user_id'=> $user->id,'active' => 1])->paginate(5);
        $likes = $user->likedPosts;
        $followers = $user->followers;
        $following = $user->following;
        return view('dashboard.dashboard')->with(compact(['user','posts','likes','followers','following']));
    }

    public function getLikes(){
        $user = Auth::getUser();
        $likes = $user->likedPosts()->paginate(10);
        return view('dashboard.likes')->with(compact('likes'));
    }

    public function getPosts(){
        $user = Auth::getUser();
        $posts = Post::where(['user_id'=> $user->id,'active' => 1])->paginate(10);
        return view('dashboard.posts')->with(compact('posts'));
    }
    public function getFollowers(){
        $user = Auth::getUser();
        $followers = $user->followers;
        return view('dashboard.followers')->with(compact('followers'));
    }
    public function getFollowing(){
        $user = Auth::getUser();
        $followers = $user->following;
        return view('dashboard.following')->with(compact('followers'));
    }
}
