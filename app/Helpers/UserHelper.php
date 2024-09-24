<?php
namespace App\Helpers;

use App\Models\User;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Auth;

class UserHelper {
    static function getNearUsers(){
        // $user_ip = GeoIP::getClientIP(); 
        // $location = GeoIP::getLocation($user_ip);
        $user_ip = '127.0.0.1';
        $location = 'Barcelona';
        $near_users = User::where('user_location',$location)->limit(5)->get();
        $users = [];
        
        $users = $near_users->reject(function($user) {
            return Auth::id() === $user->id;
        });
        return ['user_ip' => $user_ip,'location' => $location, 'users' => $users];
    }
}