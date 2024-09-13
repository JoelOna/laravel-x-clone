<?php
namespace App\Helpers;

use Torann\GeoIP\Facades\GeoIP;
use App\Models\User;
class UserHelper {
    static function getNearUsers(int $user_id){
        // $user_ip = GeoIP::getClientIP(); 
        // $location = GeoIP::getLocation($user_ip);
        $user_ip = '127.0.0.1';
        $location = 'Barcelona';
        $near_users = User::where('user_location',$location)->limit(5)->get();
        $users = [];
       foreach ($near_users as $user) {
        if ($user_id !== $user->id) {
            $users[] = $user;
        }
       }
        return ['user_ip' => $user_ip,'location' => $location, 'users' => $users];
    }
}