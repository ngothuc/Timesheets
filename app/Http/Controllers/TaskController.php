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
        return view('tasks-list', [
            'timesheet' => $timesheet,
            'tasks' => $this->taskService->getTasksByTimesheet($timesheet),
        ]);
    }

    public function taskView(Task $task) {
        return view('task-view', [
            'task' => $task,
        ]);
    }
    public function update($id, UpdateTaskRequest $request) {
        $task = $this->taskService->update($id, $request);
        return redirect()->route('task-view', ['task' => $task]);
    }
    public function delete($id) {       
        $timesheet = $this->taskService->delete($id);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }
    public function create(Timesheet $timesheet) {
        return view('task-create', ['timesheet' => $timesheet]);
    }

    public function store(StoreTaskRequest $request, Timesheet $timesheet) {
        $task = $this->taskService->store($request, $timesheet);
        return redirect()->route('task-view', ['task' => $task]);
    }
}
