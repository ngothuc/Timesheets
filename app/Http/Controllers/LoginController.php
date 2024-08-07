<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user' => $user->id]);
            return redirect()->route('profile', ['user' => $user]);
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function showProfile()
    {
        return view('profile', [
            'user' => User::find(session('user')),
        ]);
    }
}
