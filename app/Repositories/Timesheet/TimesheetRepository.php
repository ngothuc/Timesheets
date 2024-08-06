<?php

namespace App\Repositories\Timesheet;

use App\Models\Timesheet;
use App\Repositories\BaseRepository;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;

class TimesheetRepository extends BaseRepository implements TimesheetRepositoryInterface {
    public function __construct(Timesheet $model) {
        parent::__construct($model);
    }
}