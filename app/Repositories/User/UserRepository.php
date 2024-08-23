<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
    public function __construct(User $model) {
        parent::__construct($model);
    }

    public function findByEmail($email) {
        return $this->model::where('email', $email)->first();
    }

    public function all($perPage = 10) {
        return $this->model->paginate($perPage);
    }

}