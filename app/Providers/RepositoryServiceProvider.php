<?php

namespace App\Providers;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Contracts\Repositories\DepartmentRepositoryInterface;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            UserRepositoryInterface::class,
            UserRepository::class,
        ],
        'book' => [
            BookRepositoryInterface::class,
            BookRepository::class,
        ],
        'category' => [
            CategoryRepositoryInterface::class,
            CategoryRepository::class,
        ],
        'comment' => [
            CommentRepositoryInterface::class,
            CommentRepository::class,
        ],
        'role' => [
            RoleRepositoryInterface::class,
            RoleRepository::class,
        ],
        'department' => [
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class,
        ],

    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}
