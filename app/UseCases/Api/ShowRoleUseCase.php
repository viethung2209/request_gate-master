<?php


namespace App\UseCases\Api;


use App\Contracts\Services\Api\RoleServiceInterface;
use App\UseCases\Api\UseCase;

class ShowRoleUseCase extends UseCase
{

    /**
     * @var RoleServiceInterface
     */
    protected RoleServiceInterface $roleService;

    /**
     * GetBooksUseCase constructor.
     * @param RoleServiceInterface $roleService
     */
    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
        parent::__construct();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function showRole($params): array
    {

        $department = $this->roleService->index($params);
        return [
            'data' => $department,
        ];
    }

}
