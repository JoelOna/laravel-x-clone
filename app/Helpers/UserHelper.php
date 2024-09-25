<?php
namespace App\Helpers;

use App\Models\User;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;

class UserHelper {
    static function getNearUsers(){
        $user_ip = $_SERVER['REMOTE_ADDR'];

        if (env('APP_ENV') === 'local') {
            $user_ip ='84.88.0.19';
        }
        $location = Location::get($user_ip);
        $near_users = User::where('user_location',$location->countryName)->limit(5)->get();
        
        $users = $near_users->reject(function($user) {
            return Auth::id() === $user->id;
        });
        return ['user_ip' => $user_ip,'location' => $location, 'users' => $users];
    }
}