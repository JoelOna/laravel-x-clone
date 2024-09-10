<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    //

    public function store(LikeRequest $request){
        $like_validated = $request->validated();
        Like::create($like_validated);
    }

    public function destroy(LikeRequest $request){
        $like_validated = $request->validated();
        Like::where(['user_id' => $like_validated['user_id'],'post_id' => $like_validated['post_id']])->first()->delete();
    }
}
