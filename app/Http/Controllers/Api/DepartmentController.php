<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Api\DepartmentServiceInterface;
use App\Exceptions\CheckAuthenticationException;
use App\Exceptions\CheckAuthorizationException;
use App\Exceptions\NotFoundException;
use App\Exceptions\QueryException;
use App\Exceptions\ServerException;
use App\Exceptions\UnprocessableEntityException;
use App\Http\Requests\Api\Books\UpdateOrCreateBooksRequest;
use App\Http\Requests\Api\Deparments\IndexRequest;
use App\Http\Requests\Api\Deparments\DepartmentRequest;
use App\UseCases\Api\IndexDepartmentUseCase;
use App\UseCases\Api\ListDepartmentUseCase;
use App\UseCases\Api\ShowDepartmentUseCase;
use App\UseCases\Api\StoreDepartmentUseCase;
use App\UseCases\Api\UpdateDepartmentUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartmentController extends ApiController
{
    /**
     * UserController constructor.
     * @param DepartmentServiceInterface $departmentService
     */
    public function __construct(DepartmentServiceInterface $departmentService)
    {
        $this->departmentService = $departmentService;
        parent::__construct();
    }

    /**
     * @param IndexRequest $request
     * @param IndexDepartmentUseCase $indexDepartmentUseCase
     * @return JsonResponse
     */
    public function index(IndexRequest $request,
                          IndexDepartmentUseCase $indexDepartmentUseCase): JsonResponse
    {
        $params = $request->all();

        return  $this->renderJson($indexDepartmentUseCase->indexDepartment($params),
            __('response.departments.index_department'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @param StoreDepartmentUseCase $storeDepartmentUseCase
     * @return JsonResponse
     */
    public function store(DepartmentRequest $request,
                          StoreDepartmentUseCase $storeDepartmentUseCase): JsonResponse
    {
        $params = $request->all();

        return $this->renderJson($storeDepartmentUseCase->storeDepartment($params),
            __('response.departments.store_department'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param ShowDepartmentUseCase $showDepartmentUseCase
     * @return JsonResponse
     */
    public function show(int $id, ShowDepartmentUseCase $showDepartmentUseCase): JsonResponse
    {
        return $this->renderJson($showDepartmentUseCase->showDepartment($id),
            __('response.departments.show_department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param DepartmentRequest $request
     * @param UpdateDepartmentUseCase $updateDepartmentUseCase
     * @return JsonResponse
     */
    public function update(int $id, DepartmentRequest $request,
                           UpdateDepartmentUseCase $updateDepartmentUseCase): JsonResponse
    {
        $params = $request->all();

        return $this->renderJson($updateDepartmentUseCase->updateDepartment($params, $id),
            __('response.departments.update_department'));
    }


    /**
     * @param Request $request
     * @param ListDepartmentUseCase $listDepartmentUseCase
     * @return JsonResponse
     */
    public function listDepartment(Request $request,
                                   ListDepartmentUseCase $listDepartmentUseCase): JsonResponse
    {
        $params = $request->all();
        return $this->renderJson($listDepartmentUseCase->listDepartment($params),
            __('response.departments.list_department'));
    }

}
