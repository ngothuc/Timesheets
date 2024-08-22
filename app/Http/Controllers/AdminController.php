<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Services\UserService;

class AdminController extends UserController {

    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function showLoginForm() {
        return view('admin.admin-login');
    }

    public function adminLogin(AdminLoginRequest $request) {
        return $this->userService->adminLogin($request);
    }

    public function showDashboard() {
        return view('admin.admin-dashboard');
    }

}