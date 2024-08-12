<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\Task;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;
    protected $timesheetService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function showTasks(Timesheet $timesheet)
    {
        return $this->taskService->showTasks($timesheet);
    }

    public function taskView(Task $task) {
        return view('task-view', [
            'task' => $task,
        ]);
    }
    public function update($id, UpdateTaskRequest $request) {
        return $this->taskService->update($id, $request);
    }
    public function delete($id) {
        return $this->taskService->delete($id);
    }
    public function create(Timesheet $timesheet) {
        return view('task-create', ['timesheet' => $timesheet]);
    }

    public function store(StoreTaskRequest $request, Timesheet $timesheet) {
        return $this->taskService->store($request, $timesheet);
    }
}
