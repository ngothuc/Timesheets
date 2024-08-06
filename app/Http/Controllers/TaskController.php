<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;

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
}
