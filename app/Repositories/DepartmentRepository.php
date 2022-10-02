<?php

namespace App\Repositories;

use App\Contracts\Repositories\DepartmentRepositoryInterface;
use App\Models\Department;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param Department $deparment
     */
    public function __construct(Department $deparment)
    {
        parent::__construct($deparment);
    }

    public function getColumns($columns = ['*'], $with = [])
    {
        return $this->model->select($columns)->with($with)
            ->orderBy('id', 'desc');
    }

    public function existsDepartmentByAttribute($value, $attribute = 'name', $exceptId = null): bool
    {
        return $this->model
            ->where($attribute, $value)
            ->when($exceptId, function ($query) use ($exceptId) {
                $query->where('id', '<>', $exceptId);
            })
            ->exists();
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param array $condition
     * @param array|string[] $column
     * @param array $with
     * @return mixed|void
     */
    public function getDepartments(int $page, int $perPage, array $condition = [], array $column = ['*'], $with = [])
    {
        return $this->model
            ->when(count($condition), function ($query) use ($condition) {
                $query->where($condition);
            })
            ->with($with)
            ->paginate($perPage, $column, 'currentPage', $page);
    }
}
