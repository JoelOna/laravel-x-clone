<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index($user_name_x){
        $user = User::where(['user_name_x' => $user_name_x])->first();
        $users = UserHelper::getNearUsers();
        return view('users.profile.index',['user' => $user, 'users' => $users['users']]);
    }
}
