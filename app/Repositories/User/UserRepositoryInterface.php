<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface {
    public function findByEmail($email);

    public function all($perPage = 10);

}