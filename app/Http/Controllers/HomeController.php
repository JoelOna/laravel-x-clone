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
        // $posts =  Post::getUserFollowingPosts();
        $user = Auth::user();
        if (is_null($user)) {
            $users = UserHelper::getNearUsers(0);
            $posts = Post::orderBy('created_at')->limit(20)->get();
            return view('home')->with(['posts' => $posts, 'users' => $users['users']]);
        }
        $following_users = Follow::select('follower_id')->where(['user_id' => $user->id])->get();
        $posts = Post::whereIn('user_id',$following_users)->orderBy('created_at')->limit(20)->get();
        // // Obtener todos los "likes" del usuario autenticado para estos posts
        // $liked_posts = Like::where('user_id', $user->id)
        //                     ->whereIn('post_id', $posts->pluck('id'))
        //                     ->pluck('post_id') // Solo obtener los IDs de los posts a los que ha dado like
        //                     ->toArray(); // Convertir a array para fácil manipulación

        // // Añadir la propiedad 'has_liked' a cada post
        // foreach ($posts as $post) {
        //     $post->has_liked = in_array($post->id, $liked_posts);
        // }
        $users = UserHelper::getNearUsers($user->id);
        return view('home')->with(['posts' => $posts,'user' => $user, 'users' => $users['users']]);
     }
}
