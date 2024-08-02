<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Models\Task;

class TaskController extends Controller
{
    public function showTasks(Timesheet $timesheet)
    {
        return view('tasks-list', [
            'timesheet' => $timesheet,
            'tasks' => Task::where('timesheet_id', $timesheet->id)->get(),
        ]);
    }
}
