<?php

namespace App\Services;

use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use App\Http\Requests\User\StoreTimesheetRequest;
use App\Http\Requests\User\UpdateTimesheetRequest;
use App\Models\Timesheet;

class TimesheetService
{
    protected $timesheetRepository;

    public function __construct(TimesheetRepositoryInterface $timesheetRepository)
    {
        $this->timesheetRepository = $timesheetRepository;
    }

    public function getListTimesheets()
    {
        $user = UserService::getLoginUser();
        $timesheets = Timesheet::where('user_id', $user->id)
        ->orderByDesc('date')
        ->paginate(7);
        return $timesheets;

    }

    public function store(StoreTimesheetRequest $request)
    {
        $user = UserService::getLoginUser();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $timesheet = $this->timesheetRepository->create($data);
        return $timesheet;
    }

    public function update($id, UpdateTimesheetRequest $request)
    {
        $timesheet = $this->timesheetRepository->find($id);
        $timesheet->update($request->all());
        return $timesheet;
    }

    public function delete($id)
    {
        $timesheet = $this->timesheetRepository->find($id);
        $timesheet->delete();
    }

    public function getTimesheetByDate($date) {
        $timesheets = $this->getListTimesheets();
        foreach ($timesheets as $timesheet) {
            if ($timesheet->date == $date) {
                return $timesheet;
            }
        }
    }
}