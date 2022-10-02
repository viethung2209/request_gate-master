<?php

namespace App\Repositories;

use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function getRole(int $page, int $perPage, array $condition = [], array $column = ['*'], $with = [])
    {
        return $this->model
            ->when(count($condition), function ($query) use ($condition) {
                $query->where($condition);
            })
            ->with($with)
            ->paginate($perPage, $column, 'currentPage', $page);
    }
}
