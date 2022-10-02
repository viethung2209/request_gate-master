<?php

namespace App\Contracts\Services\Api;

interface UserServiceInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function index($params);

    /**
     * @param $user
     * @return $user
     */
    public function findOrCreate($user);
}
