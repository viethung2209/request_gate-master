<?php

namespace App\Services\Api;

use App\Contracts\Repositories\DepartmentRepositoryInterface;
use App\Contracts\Services\Api\DepartmentServiceInterface;
use App\Services\AbstractService;
use Throwable;

class DepartmentService extends AbstractService implements DepartmentServiceInterface
{
    /**
     * @var DepartmentRepositoryInterface
     */
    protected DepartmentRepositoryInterface $departmentRepository;

    /**
     * UserService constructor.
     * @param DepartmentRepositoryInterface $deparmentRepository
     */
    public function __construct(DepartmentRepositoryInterface $deparmentRepository)
    {
        $this->departmentRepository = $deparmentRepository;
    }

    /**
     * @param $params
     * @return array
     */
    public function index($params): array
    {

        try {
            $data = [
                'per_page' => 10,
            ];
            $params = array_merge($data, $params);
            return [
                'code' => 200,
                'data' => $this->departmentRepository
                    ->getColumns(['id', 'name', 'description', 'status'])
                    ->paginate($params['per_page'])
            ];
        } catch (Throwable $th) {
            return [
                'code' => 400,
                'message' => trans('messages.department.listError'),
            ];
        }
    }

     /**
     * @param $params
     * @return array
     */
    public function store($params): array
    {
        try {
            $departmentStore = $this->departmentRepository->create($params);
            return [
                'code' => 200,
                'message' => trans('messages.department.storeSuccess'),
                'data' =>  $departmentStore,
            ];
        } catch (Throwable $th) {
            return [
                'code' => 400,
                'message' => trans('messages.department.storeError'),
            ];
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id): array
    {
        try {
            return [
                'code' => 200,
                'data' => $this->departmentRepository->find($id)
            ];
        } catch (Throwable $th) {
            return [
                'code' => 400,
                'message' => trans('messages.department.departmentEmpty'),
            ];
        }
    }

    /**
     * @param $data
     * @param  $id
     * @return bool|mixed
     */
    public function update($data, $id)
    {
        try {
            return [
                'code' => 200,
                'message' => trans('messages.department.updateSuccess'),
                'data' =>  $this->departmentRepository->find($id)->update($data),
            ];
        } catch (Throwable $th) {
            return [
                'code' => 400,
                'message' => trans('messages.department.departmentEmpty'),
            ];
        }
    }

    public function listDepartment($params): array
    {
        $result = $this->departmentRepository->getColumns()->get();
        try {
            return [
                'code' => 200,
                'data' => $result,

            ];
        } catch (Throwable $th) {
            return [
                'code' => 400,
                'message' => trans('messages.department.listError'),
            ];
        }
    }
}
