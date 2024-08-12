<?php

namespace App\Services;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Timesheet;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;

class TaskService {

    protected $taskRepository;
    protected $timesheetRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, TimesheetRepositoryInterface $timesheetRepository) {
        $this->taskRepository = $taskRepository;
        $this->timesheetRepository = $timesheetRepository;
    }
    public function showTasks(Timesheet $timesheet) {
        return view('tasks-list', [
            'timesheet' => $timesheet,
            'tasks' => $this->taskRepository->all()
                    ->where('timesheet_id', $timesheet->id),
        ]);
    }

    public function update($id, UpdateTaskRequest $request) {
        $task = $this->taskRepository->find($id);
        $task->update($request->all());
        $this->updateTimesheetUpdateTime($task->timesheet_id);
        return redirect()->route('task-view', ['task' => $task]);
    }

    public function delete($id) {
        $task = $this->taskRepository->find($id);
        $timesheet = $task->timesheet_id;
        $task->delete();
        $this->updateTimesheetUpdateTime($task->timesheet_id);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }

    public function store(StoreTaskRequest $request, Timesheet $timesheet) {
        $data = $request->all();
        $data['timesheet_id'] = $timesheet->id;
        $task = $this->taskRepository->create($data);
        $this->updateTimesheetUpdateTime($task->timesheet_id);
        return redirect()->route('task-view', ['task' => $task]);
    }
    private function updateTimesheetUpdateTime($timesheetId) {
        $timesheet = $this->timesheetRepository->find($timesheetId);
        $timesheet->updated_at = now();
        $timesheet->save();
    }

}