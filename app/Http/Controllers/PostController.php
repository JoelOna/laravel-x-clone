<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function store(PostRequest $request)
    {
        $post_validated = $request->validated();
        $post_validated['user_id'] = Auth::id(); 
        Post::create($post_validated);
        return redirect()->route('home')->with('message', 'Post created successfully.');
    }

}
