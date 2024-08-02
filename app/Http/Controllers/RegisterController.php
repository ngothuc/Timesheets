<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm() {
        return view('register');
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|'
        ]);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password =  bcrypt($data['password']);
        $user->save();
        return redirect()->route('login-form')->with('success', 'Đăng ký thành công');
    }
}
