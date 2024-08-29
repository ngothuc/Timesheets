<?php

namespace App\Repositories\Timesheet;

use App\Models\Timesheet;
use App\Repositories\BaseRepository;
use App\Repositories\Timesheet\TimesheetRepositoryInterface;

class TimesheetRepository extends BaseRepository implements TimesheetRepositoryInterface {
    public function __construct(Timesheet $model) {
        parent::__construct($model);
    }

    public function findByUserId($userId) {
        return $this->model::where('user_id', $userId)->get();
    }

    public function all( $perPage = 10 ) {
        return Timesheet::with('user')->paginate($perPage);
    }

    public function where($attribute, $value) {
        $timesheets = $this->model::all()->sortByDesc('date');
        return $timesheets->where($attribute, $value);
    }

}