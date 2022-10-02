<?php


namespace App\UseCases\Api;


use App\Contracts\Services\Api\DepartmentServiceInterface;

class ListDepartmentUseCase extends UseCase
{

    /**
     * @var DepartmentServiceInterface
     */
    protected DepartmentServiceInterface $departmentService;

    /**
     * GetBooksUseCase constructor.
     * @param DepartmentServiceInterface $departmentService
     */
    public function __construct(DepartmentServiceInterface $departmentService)
    {
        $this->departmentService = $departmentService;
        parent::__construct();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function listDepartment(array $params): array
    {

        $department = $this->departmentService->listDepartment($params);
        return [
            'data' => $department,
        ];
    }

}
