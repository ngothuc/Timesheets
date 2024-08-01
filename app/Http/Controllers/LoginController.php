<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user' => $user->id]);
            return redirect()->route('profile', ['user' => $user]);
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function showProfile(User $user)
    {
        return view('profile', [
            'user' => $user,
        ]);
    }

    public function main() {
        $hashedValue = Hash::make('123456');
        echo $hashedValue; // Output: $2y$10$u5b538Z99W.31j8w...
    }
}
