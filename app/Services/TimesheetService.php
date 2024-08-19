<?php

namespace App\Services;

use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use App\Http\Requests\StoreTimesheetRequest;
use App\Http\Requests\UpdateTimesheetRequest;

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
        $timesheets = $this->timesheetRepository->all()
        ->where('user_id', $user->id)
        ->sortByDesc('date');
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