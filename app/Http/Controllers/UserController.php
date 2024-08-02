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

    public function updateProfile(Request $request) {
        $this->validate($request, [
            'name' =>'required',
        ]);

        $user = UserController::getLoginUser();
        $user->name = $request->name;
        $user->description = $request->description;
        $user->avatar = $request->avatar;
        $user->save();

        return redirect()->route('profile');
    }
}
