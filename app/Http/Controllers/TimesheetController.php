<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;

class TimesheetController extends Controller
{
    public static function getListTimesheets() {
        $user = UserController::getLoginUser();
        $timesheets = Timesheet::where('user_id', $user->id)->get();
        return $timesheets;
    }

    public function showListTimesheets() {
        return view('timesheets-list', [
            'user' => UserController::getLoginUser(),
            'timesheets' => TimeSheetController::getListTimesheets(),
        ]);
    }

    public function create() {
        return view('timesheets-create');
    }

    public function store(Request $request) {
        $data = $request;
        $user = UserController::getLoginUser();
        $data['user_id'] = $user->id;
        $timesheet = Timesheet::create($data);
        $timesheet->save();
        return redirect()->route('timesheets-list');
    }
}
