<?php
use Torann\GeoIP\Facades\GeoIP;
use App\Models\User;

if (! function_exists('getNearUsers')) {
    function getNearUsers(){
        // $user_ip = GeoIP::getClientIP(); 
        $user_ip = '127.0.0.1';
        // $location = GeoIP::getLocation($user_ip);
        $location = 'Barcelona';
        $users = User::where('user_location',$location)->limit(5)->get();
    
        return ['user_ip' => $user_ip,'location' => $location, 'users' => $users];
    }
}
