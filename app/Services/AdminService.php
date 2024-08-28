<?php

namespace App\Services;

use App\Repositories\User\UserRepository;
use App\Repositories\Timesheet\TimesheetRepository;
use App\Repositories\Task\TaskRepository;

use App\Http\Requests\Admin\AdminLoginRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Http\Requests\Admin\DeleteAccountRequest;

use Illuminate\Support\Facades\Hash;

class AdminService {
    protected $userRepository;
    protected $timesheetRepository;
    protected $taskRepository;

    public function __construct(UserRepository $userRepository, TimesheetRepository $timesheetRepository, TaskRepository $taskRepository) {
        $this->userRepository = $userRepository;
        $this->timesheetRepository = $timesheetRepository;
        $this->taskRepository = $taskRepository;
    }
    public function adminLogin(AdminLoginRequest $request) {
        $data = $request->all();
        $user = $this->userRepository->findByEmail($data['email']);

        if ($user && Hash::check($data['password'], $user->password) && $user->role === 'admin') {
            session(['user' => $user->id]);
            session(['role' => $user->role]);
            return redirect()->route('admin-dashboard');
        } else {
            return redirect()->route('admin-login-form');
        }
    }

    public function resetPassword(ResetPasswordRequest $request) {
        $userId = $request->userId;
        $user = $this->userRepository->find($userId);
        $user->password = bcrypt("123456");
        $user->save();
    }

    public function deleteAccount(DeleteAccountRequest $request) {
        $userId = $request->userId;
        $user = $this->userRepository->find($userId);
        $user->delete();
    }

    public function getAllTimesheets() {
        $timesheets = $this->timesheetRepository->all();
        return $timesheets;
    }

}