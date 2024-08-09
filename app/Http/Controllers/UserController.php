<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request) {
        return $this->userService->login($request);
    }
    public function showLoginForm() {
        return view('login');
    }
    public function showProfile()
    {
        return view('profile', [
            'user' => $this->userService->getLoginUser(),
        ]);
    }

    public function logout() {
        return $this->userService->logout();
    }

    public function updateProfile(UpdateProfileRequest $request) {
        return $this->userService->updateProfile($request);
    }
    public function showChangePasswordForm() {
        return view('change-password');
    }
    public function changePassword(ChangePasswordRequest $request) {
        return $this->userService->changePassword($request);
    }
    public function showRegisterForm() {
        return view('register');
    }
    public function register(RegisterRequest $request) {
        return $this->userService->register($request);
    }

}
