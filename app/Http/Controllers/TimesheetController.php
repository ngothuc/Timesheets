<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimesheetRequest;
use App\Http\Requests\UpdateTimesheetRequest;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Services\TimesheetService;
use App\Services\UserService;

class TimesheetController extends Controller
{
    protected $timesheetService;

    public function __construct(TimesheetService $timesheetService) {
        $this->timesheetService = $timesheetService;
    }

    public function getListTimesheets() {
        return $this->timesheetService->getListTimesheets();
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
       return $this->timesheetService->store($request);
    }
    public function update($id, UpdateTimesheetRequest $request) {
        return $this->timesheetService->update($id, $request);
    }
    public function delete($id) {
        return $this->timesheetService->delete($id);
    }

}
