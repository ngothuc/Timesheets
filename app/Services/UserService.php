<?php

namespace App\Services;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Repositories\Timesheet\TimesheetRepository;
use Illuminate\Support\Facades\Hash;

class UserService {
    protected $userRepository;
    protected $timesheetRepository;
    public function __construct(UserRepository $userRepo, TimesheetRepository $timesheetRepository) {
        $this->userRepository = $userRepo;
        $this->timesheetRepository = $timesheetRepository;
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

    public function getAllUsers() {
        $users = $this->userRepository->all(5);
        foreach ($users as $user) {
            $user->late_count = $this->calculateLateCount($user->id);
        }
        return $users;
    }

    private function calculateLateCount($userId) {
        $timesheetsList = $this->timesheetRepository->findByUserId($userId);
        $lateCount = 0;
        foreach ($timesheetsList as $timesheet) {
            if ($timesheet->created_at && $timesheet->updated_at >= \Carbon\Carbon::parse($timesheet->date)->addDay()) {
                $lateCount++;
            }
        }
        return $lateCount;
    }

    public function getUserById($id) {
        return $this->userRepository->find($id);
    }

}