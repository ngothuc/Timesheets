<?php

namespace App\Http\Controllers\User;

use App\Models\Timesheet;
use App\Models\Task;
use App\Http\Requests\User\UpdateTaskRequest;
use App\Http\Requests\User\StoreTaskRequest;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\TaskService;
use App\Services\UserService;
use App\Services\TimesheetService;


class TaskController extends Controller
{
    protected $taskService;
    protected $timesheetService;

    public function __construct(TaskService $taskService, TimesheetService $timesheetService)
    {
        $this->taskService = $taskService;
        $this->timesheetService = $timesheetService;
    }

    public function showTasks(Timesheet $timesheet)
    {
        return view('tasks-list', [
            'timesheet' => $timesheet,
            'tasks' => $this->taskService->getTasksByTimesheet($timesheet),
        ]);
    }

    public function taskView(Task $task)
    {
        return view('task-view', [
            'task' => $task,
        ]);
    }
    public function update($id, UpdateTaskRequest $request)
    {
        $task = $this->taskService->update($id, $request);
        return redirect()->route('tasks-list', ['timesheet' => $task->timesheet_id]);
    }
    public function delete($id)
    {
        $timesheet = $this->taskService->delete($id);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }
    public function create(Timesheet $timesheet)
    {
        return view('task-create', ['timesheet' => $timesheet]);
    }

    public function store(StoreTaskRequest $request, Timesheet $timesheet)
    {
        $task = $this->taskService->store($request, $timesheet);
        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }

    public function getTasksByDate($date)
    {
        $timesheet = $this->timesheetService->getTimesheetByDate($date);
        $tasks = $this->taskService->getTasksByTimesheet($timesheet);
        return response()->json($tasks);
    }

    public function completed($id) {
        $this->taskService->completed($id);
        $task = $this->taskService->find($id);       
        return redirect()->route('tasks-list', ['timesheet' => $task->timesheet_id]);
    }
    
}
