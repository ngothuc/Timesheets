<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimesheetRequest;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Timesheet;

class TimesheetController extends Controller
{
    protected $timesheetRepo;

    public function __construct(TimesheetRepositoryInterface $timesheetRepo) {
        $this->timesheetRepo = $timesheetRepo;
    }

    public function getListTimesheets() {
        $user = UserController::getLoginUser();
        $timesheets = $this->timesheetRepo->all()
        ->where('user_id', $user->id);
        return $timesheets;
    }

    public function showListTimesheets() {
        return view('timesheets-list', [
            'user' => UserController::getLoginUser(),
            'timesheets' => $this->getListTimesheets(),
        ]);
    }

    public function create() {
        return view('timesheets-create');
    }

    public function store(StoreTimesheetRequest $request) {

        $user = UserController::getLoginUser();
        $data = $request->validated();
        $data['user_id'] = $user->id;
        $this->timesheetRepo->create($data);

    }
}
