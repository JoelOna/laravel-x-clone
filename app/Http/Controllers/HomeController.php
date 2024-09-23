<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if (is_null($user)) {
            $users = UserHelper::getNearUsers(0);
            $posts = Post::orderBy('created_at')->limit(20)->get();
            return view('home')->with(['posts' => $posts, 'users' => $users['users']]);
        }
        $following_users = Follow::select('follower_id')->where(['user_id' => $user->id])->get();
        $posts = Post::whereIn('user_id',$following_users)->orderBy('created_at')->limit(20)->get();

        $users = UserHelper::getNearUsers($user->id);
        return view('home')->with(['posts' => $posts,'user' => $user, 'users' => $users['users']]);
     }
}
