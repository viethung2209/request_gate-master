<?php

namespace App\Services\Api;

use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Contracts\Services\Api\RoleServiceInterface;
use App\Services\AbstractService;
use Throwable;

class RoleService extends AbstractService implements RoleServiceInterface
{
    /**
     * @var RoleRepositoryInterface
     */
    protected RoleRepositoryInterface $roleRepository;

    /**
     * UserService constructor.
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param $params
     * @return array
     */
    public function index($params): array
    {
//        return $this->roleRepository->getColumns()->paginate(10);
        $result = $this->roleRepository->getColumns()->get();
        try {
            return [
                'code' => 200,
                'data' => $result
            ];
        } catch (Throwable $th) {
            return [
                'code' => 400,
                'message' => trans('messages.role.indexError'),
            ];
        }
    }
}
