<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(
        protected User $model
    ) {}

    public function save(User $user)
    {
        return $this->model->create($user);
    }

    public function find(Int $id)
    {
        return $this->model->find($id);
    }
}
