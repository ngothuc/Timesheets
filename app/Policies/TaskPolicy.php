<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Models\Timesheet;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->role === "admin";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task)
    {
        $timesheet = Timesheet::find($task->timesheet_id);

        return $user->id == $timesheet->user_id || $user->role === "admin";
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task)
    {
        $timesheet = Timesheet::find($task->timesheet_id);

        return $user->id == $timesheet->user_id || $user->role === "admin";
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task)
    {
        $timesheet = Timesheet::find($task->timesheet_id);

        return $user->id == $timesheet->user_id || $user->role === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task){
        $timesheet = Timesheet::find($task->timesheet_id);

        return $user->id == $timesheet->user_id || $user->role === "admin";
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task) {
        $timesheet = Timesheet::find($task->timesheet_id);

        return $user->id == $timesheet->user_id || $user->role === "admin";
    }
}
