<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Requests\FollowRequest;

class FollowController extends Controller
{
    //
    public function follow(FollowRequest $request){
        $validated = $request->validated();
        Follow::create($validated);
    }

    public function unfollow(FollowRequest $request){
        $validated = $request->validated();
        Follow::where(['user_id' => $validated->user_id, 'follower_id' => $validated->follower_id])->delete();
    }
}
