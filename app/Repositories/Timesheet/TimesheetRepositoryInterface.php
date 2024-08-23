<?php

namespace App\Repositories\Timesheet;

use App\Repositories\RepositoryInterface;

interface TimesheetRepositoryInterface extends RepositoryInterface {

    public function findByUserId($userId);
    
}