<?php

namespace App\Http\Modules\Rol\Application;

use App\Http\Modules\Rol\Domain\TransferData\DTO\CreateRolDTO;

class RolUseCases
{
    protected RolApplicationService $rolApplicationService;

    public function __construct(RolApplicationService $rolApplicationService)
    {
        $this->rolApplicationService = $rolApplicationService;
    }

    public function createRol(CreateRolDTO $dto)
    {
        return $this->rolApplicationService->createRol($dto);
    }

    public function getAllRoles()
    {
        return $this->rolApplicationService->getAllRoles();
    }
}
