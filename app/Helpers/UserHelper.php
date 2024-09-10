<?php
namespace App\Helpers;

use Torann\GeoIP\Facades\GeoIP;
use App\Models\User;
class UserHelper {
    static function getNearUsers(){
        // $user_ip = GeoIP::getClientIP(); 
        // $location = GeoIP::getLocation($user_ip);
        $user_ip = '127.0.0.1';
        $location = 'Barcelona';
        $users = User::where('user_location',$location)->limit(5)->get();

        return ['user_ip' => $user_ip,'location' => $location, 'users' => $users];
    }
}