<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimesheetRequest;
use App\Http\Requests\UpdateTimesheetRequest;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Services\UserService;

class TimesheetController extends Controller
{
    protected $timesheetRepo;

    public function __construct(TimesheetRepositoryInterface $timesheetRepo) {
        $this->timesheetRepo = $timesheetRepo;
    }

    public function getListTimesheets() {
        $user = UserService::getLoginUser();
        $timesheets = $this->timesheetRepo->all()
        ->where('user_id', $user->id);
        return $timesheets;
    }

    public function showListTimesheets() {
        return view('timesheets-list', [
            'user' => UserService::getLoginUser(),
            'timesheets' => $this->getListTimesheets(),
        ]);
    }

    public function create() {
        return view('timesheets-create');
    }

    public function store(StoreTimesheetRequest $request) {
        $user = UserService::getLoginUser();
        $data = $request->validated();
        $data['user_id'] = $user->id;
        $timesheet = $this->timesheetRepo->create($data);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet->id]);
    }
    public function update($id, UpdateTimesheetRequest $request) {

        $request->validated();
        $timesheet = $this->timesheetRepo->find($id);
        $timesheet->update($request->all());

        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }
    public function delete($id) {
        $timesheet = $this->timesheetRepo->find($id);
        $timesheet->delete();
        return redirect()->route('timesheets-list');
    }
}
