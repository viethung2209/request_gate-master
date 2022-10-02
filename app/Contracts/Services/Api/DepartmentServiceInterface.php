<?php

namespace App\Contracts\Services\Api;

interface DepartmentServiceInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function index($params);

    /**
     * @param $params
     * @return mixed
     */
    public function store($params);

    /**
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id);

    /**
     * @param $params
     * @return mixed
     */
    public function listDepartment($params);
}
