<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreTimesheetRequest;
use App\Http\Requests\User\UpdateTimesheetRequest;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Services\TimesheetService;
use App\Services\UserService;

class TimesheetController extends Controller
{
    protected $timesheetService;

    public function __construct(TimesheetService $timesheetService)
    {
        $this->timesheetService = $timesheetService;
    }

    public function showListTimesheets()
    {
        return view('timesheets-list', [
            'user' => UserService::getLoginUser(),
            'timesheets' => $this->timesheetService->getListTimesheets(),
        ]);
    }

    public function create()
    {
        return view('timesheets-create');
    }

    public function store(StoreTimesheetRequest $request)
    {
        $timesheet = $this->timesheetService->store($request);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet->id]);
    }
    public function update($id, UpdateTimesheetRequest $request)
    {
        $timesheet = $this->timesheetService->update($id, $request);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }
    public function delete($id)
    {
        $this->timesheetService->delete($id);
        return redirect()->route('timesheets-list');
    }

}
