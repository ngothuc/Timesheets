<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm() {
        return view('register');
    }

    public function register(RegisterRequest $request) {
        $data = $request;
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password =  bcrypt($data['password']);
        $user->save();
        return redirect()->route('login-form')->with('success', 'Đăng ký thành công');
    }
}
