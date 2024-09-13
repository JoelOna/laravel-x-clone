<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Requests\FollowRequest;

class FollowController extends Controller
{
    //
    public function store(FollowRequest $request){
        $validated = $request->validated();
        Follow::create($validated);
    }

    public function destroy(FollowRequest $request){
        $validated = $request->validated();
        Follow::where(['user_id' => $validated['user_id'], 'follower_id' => $validated['follower_id']])->delete();
    }

    public function search($user_id, $follower_id)
    {
        $isFollowing = Follow::where(['user_id' => $user_id, 'follower_id' => $follower_id])->first();
        return response()->json([
            'isFollowing' => is_null($isFollowing) ? false : true,
        ]);
    }
}
