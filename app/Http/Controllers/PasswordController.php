<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangePasswordForm() {
        return view('change-password');
    }

    public function changePassword(ChangePasswordRequest $request) {
        $user = User::find(session('user'));
        
        if (!$user) {
            return redirect()->route('login-form')->withErrors(['message' => 'Bạn chưa đăng nhập']);
        }

        if (!Hash::check($request->input('old-password'), $user->password)) {
            return redirect()->back()->withErrors(['old-password' => 'Mật khẩu cũ không đúng']);
        }

        $user->password = bcrypt($request->input('new-password'));
        $user->save();

        return redirect()->route('logout')->with('success', 'Đổi mật khẩu thành công');
    }
}
