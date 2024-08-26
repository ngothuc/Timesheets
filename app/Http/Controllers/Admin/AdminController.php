<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserController;

use App\Services\UserService;
use App\Services\AdminService;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Http\Requests\Admin\DeleteAccountRequest;

class AdminController extends UserController {

    protected $userService;
    protected $adminService;

    public function __construct(UserService $userService, AdminService $adminService) {
        $this->userService = $userService;
        $this->adminService = $adminService;
    }

    public function showLoginForm() {
        return view('admin.admin-login');
    }

    public function adminLogin(AdminLoginRequest $request) {
        return $this->adminService->adminLogin($request);
    }

    public function showDashboard() {
        return view('admin.admin-dashboard', ['user' => $this->userService->getLoginUser()]);
    }

    public function showDashboardUsers() {
        $usersList = $this->userService->getAllUsers();
        return view('admin.users-manager', [
            'admin' => $this->userService->getLoginUser(),
            'users' => $usersList,
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request) {
        $this->adminService->resetPassword($request);
        return redirect()->route('admin-dashboard-users');
    }

    public function deleteAccount(DeleteAccountRequest $request) {
        $this->adminService->deleteAccount($request);
        return redirect()->route('admin-dashboard-users');
    }

}