<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if (is_null($user)) {
            $users = UserHelper::getNearUsers();
            $posts = Post::orderBy('created_at')->limit(20)->get();
            $user = new User();
            $user->user_img = 'https://res.cloudinary.com/dzcbguuls/image/upload/v1725458854/x-clone/mlpod5igsc6qvnoelcg3.png';
            $user->name = 'Guest';
            $user->user_name_x = 'guest';
            return view('home')->with(['posts' => $posts, 'users' => $users['users'], 'user' => $user]);
        }
        $following_users = Follow::select('follower_id')->where(['user_id' => $user->id])->get();
        $posts = Post::whereIn('user_id',$following_users)->orderBy('created_at')->limit(20)->get();

        $users = UserHelper::getNearUsers();
        return view('home')->with(['posts' => $posts,'user' => $user, 'users' => $users['users']]);
     }
}
