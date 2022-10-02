<?php

namespace App\Contracts\Repositories;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @param array $condition
     * @param array $column
     * @param array $with
     * @return mixed
     */
    public function getRole(int $page, int $perPage, array $condition = [], array $column = ['*'], $with = []);


}
