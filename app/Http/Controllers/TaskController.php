<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    protected $taskRepo;

    public function __construct(TaskRepositoryInterface $model) {
        $this->taskRepo = $model;
    }

    public function showTasks(Timesheet $timesheet)
    {
        return view('tasks-list', [
            'timesheet' => $timesheet,
            'tasks' => $this->taskRepo->all()
            ->where('timesheet_id', $timesheet->id),
        ]);
    }

    public function taskView(Task $task) {
        return view('task-view', [
            'task' => $task,
        ]);
    }
    public function update($id, UpdateTaskRequest $request) {
        $task = $this->taskRepo->find($id);
        $task->update($request->validated());
        return redirect()->route('task-view', ['task' => $task]);
    }
    public function delete($id) {
        $task = $this->taskRepo->find($id);
        $timesheet = $task->timesheet_id;
        $task->delete();
        return redirect()->route('tasks-list', ['timesheet' => $timesheet]);
    }
    public function create(Timesheet $timesheet) {
        return view('task-create', ['timesheet' => $timesheet]);
    }

    public function store(StoreTaskRequest $request, Timesheet $timesheet) {
        $data = $request->validated();
        $data['timesheet_id'] = $timesheet->id;
        $task = $this->taskRepo->create($data);
        return redirect()->route('task-view', ['task' => $task]);
    }
}
