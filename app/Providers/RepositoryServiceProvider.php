<?php

namespace App\Providers;

use App\Repository\BaseRepositoryInterface;
use App\Repository\PermissionGroupRepositoryInterface;
use App\Repository\Eloquent\PermissionGroupRepository;
use App\Repository\PermissionRepositoryInterface;
use App\Repository\Eloquent\PermissionRepository;
use App\Repository\RoleRepositoryInterface;
use App\Repository\Eloquent\RoleRepository;
use App\Repository\UserRepositoryInterface;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PermissionGroupRepositoryInterface::class, PermissionGroupRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
