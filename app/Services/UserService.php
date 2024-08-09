<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class UserService {
    protected $userRepository;
    public function __construct(UserRepository $userRepo) {
        $this->userRepository = $userRepo;
    }
    public static function getLoginUser() {
        $userId = session('user');
        $user = User::find($userId);
        return $user;
    }

    public function login(LoginRequest $request) {
        
        $data = $request->all();
        $user = $this->userRepository->findByEmail($data['email']);
  
        if ($user && Hash::check($data['password'], $user->password)) {
            session(['user' => $user->id]);
            return redirect()->route('profile', ['user' => $user]);
        } else {
            return redirect()->route('login-form');
        }
    }
    public function logout() {
        session()->forget('user');
        return redirect()->route('login-form');
    }
    public function updateProfile(UpdateProfileRequest $request) {
        $user = $this->getLoginUser();
        $user->update($request->all());
        return redirect()->route('profile');
    }

    public function changePassword(ChangePasswordRequest $request) {
        $user = $this->getLoginUser();

        if (!Hash::check($request->input('old-password'), $user->password)) {
            return redirect()->back()->withErrors(['old-password' => 'Mật khẩu cũ không đúng']);
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['new-password']);
        $user->update($data);

        return redirect()->route('logout')->with('success', 'Đổi mật khẩu thành công');
    }

    public function register(RegisterRequest $request) {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = $this->userRepository->create($data);
        $user->save();
        return redirect()->route('login-form')->with('success', 'Đăng ký thành công');
    }

}