<?php

namespace App\Providers;

use App\Contracts\Services\Api\BookServiceInterface;
use App\Contracts\Services\Api\CommentServiceInterface;
use App\Contracts\Services\Api\DepartmentServiceInterface;
use App\Contracts\Services\Api\RoleServiceInterface;
use App\Contracts\Services\Api\UserServiceInterface;
use App\Services\Api\BookService;
use App\Services\Api\CommentService;
use App\Services\Api\DepartmentService;
use App\Services\Api\RoleService;
use App\Services\Api\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $services = [
            [
                UserServiceInterface::class,
                UserService::class
            ],
            [
                BookServiceInterface::class,
                BookService::class
            ],
            [
                DepartmentServiceInterface::class,
                DepartmentService::class
            ],
            [
                RoleServiceInterface::class,
                RoleService::class
            ],
            [
                CommentServiceInterface::class,
                CommentService::class
            ],
        ];
        foreach ($services as $service) {
            list($interface, $implement) = $service;
            $this->app->bind(
                $interface,
                $implement
            );
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
