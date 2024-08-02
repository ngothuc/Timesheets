<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public static function getLoginUser() {
        $userId = session('user');
        $user = User::find($userId);
        return $user;
    }

    public function logout() {
        session()->forget('user');
        return redirect()->route('login-form');
    }
}
