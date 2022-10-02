<?php


namespace App\UseCases\Api;


use App\Contracts\Services\Api\DepartmentServiceInterface;

class ShowDepartmentUseCase extends UseCase
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
     * @param int $id
     * @return mixed
     */
    public function showDepartment(int $id): array
    {

        $department = $this->departmentService->show($id);
        return [
            'data' => $department,
        ];
    }

}
