<?php


namespace App\UseCases\Api;


use App\Contracts\Services\Api\DepartmentServiceInterface;

class UpdateDepartmentUseCase extends UseCase
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
     * @param array $params
     * @param int $id
     * @return mixed
     */
    public function updateDepartment(array $params, int $id): array
    {

        $department = $this->departmentService->update($params, $id);
        return [
            'data' => $department,
        ];
    }

}
