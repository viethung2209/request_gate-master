<?php


namespace App\UseCases\Api;


use App\Contracts\Services\Api\DepartmentServiceInterface;

class StoreDepartmentUseCase extends UseCase
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
    public function storeDepartment(array $params): array
    {

        $department = $this->departmentService->store($params);
        return [
            'data' => $department,
        ];
    }

}
