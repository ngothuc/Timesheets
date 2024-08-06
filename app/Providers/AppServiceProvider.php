<?php

namespace App\Providers;

use App\Repositories\Timesheet\TimesheetRepositoryInterface;
use App\Repositories\Timesheet\TimesheetRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TimesheetRepositoryInterface::class, TimesheetRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class); 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
