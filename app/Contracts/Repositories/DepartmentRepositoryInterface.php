<?php

namespace App\Contracts\Repositories;

interface DepartmentRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $condition
     * @param array $column
     * @param array $with
     * @return mixed
     */
    public function getDepartments(int $page, int $perPage, array $condition = [], array $column = ['*'], $with = []);

    /**
     * @param $value
     * @param string $attribute
     * @param null $exceptId
     * @return bool
     */
    public function existsDepartmentByAttribute($value, $attribute = 'name', $exceptId = null): bool;
}
