<?php 

namespace App\Repositories\Task;

use App\Repositories\BaseRepository;
use App\Models\Task;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface{
    public function __construct(Task $model) {
        parent::__construct($model);
    }
}