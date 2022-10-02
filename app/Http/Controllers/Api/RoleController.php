<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Roles\IndexRequest;
use App\Contracts\Services\Api\RoleServiceInterface;
use App\UseCases\Api\ShowRoleUseCase;
use Illuminate\Http\JsonResponse;

class RoleController extends ApiController
{
    /**
     * UserController constructor.
     * @param RoleServiceInterface $roleService
     */
    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
        parent::__construct();
    }

    /**
     * @param IndexRequest $request
     * @param ShowRoleUseCase $showRoleUseCase
     * @return JsonResponse
     */
    public function index(IndexRequest $request, ShowRoleUseCase $showRoleUseCase): JsonResponse
    {
        $params = $request->all();

        return $this->renderJson($showRoleUseCase->showRole($params),
            __('response.role.index'));
    }

}
