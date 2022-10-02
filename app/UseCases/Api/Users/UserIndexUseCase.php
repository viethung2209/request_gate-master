<?php

namespace App\UseCases\Api\Users;

use App\Contracts\Services\Api\UserServiceInterface;
use App\UseCases\Api\UseCase;

class UserIndexUseCase extends UseCase
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * UserIndexUseCase constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
        parent::__construct();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function index(array $params): array
    {
        return $this->userService->index($params);
    }
}
