<?php

namespace App\Repository\Eloquent;

use App\Models\Role;
use App\Repository\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}
