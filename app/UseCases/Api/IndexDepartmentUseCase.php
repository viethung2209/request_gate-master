<?php


namespace App\UseCases\Api;


use App\Contracts\Services\Api\DepartmentServiceInterface;

class IndexDepartmentUseCase extends UseCase
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
    public function indexDepartment(array $params): array
    {

        $department = $this->departmentService->index($params);
        return [
            'data' => $department,
        ];
    }

}
