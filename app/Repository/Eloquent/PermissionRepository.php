<?php

namespace App\Repository\Eloquent;

use App\Models\Permission;
use App\Repository\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}
