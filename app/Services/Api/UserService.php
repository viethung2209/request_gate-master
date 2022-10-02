<?php

namespace App\Services\Api;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\Api\UserServiceInterface;
use App\Services\AbstractService;

class UserService extends AbstractService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    /**
     * @param $params
     * @return array
     */
    public function index($params)
    {
        return $this->userRepository->getColumns()->get();
    }

    public function findOrCreate($user)
    {
        $userDB = $this->userRepository->findOneBy(['email' => $user['email']]);
        if (!$userDB) {
            return $this->userRepository->store($user);
        }
        return $userDB;
    }
}
