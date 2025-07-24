<?php

namespace App\Http\Modules\Rol\Application;

use App\Http\Modules\Rol\Domain\RolDomainService;
use App\Http\Modules\Rol\Domain\TransferData\DTO\CreateRolDTO;

class RolApplicationService
{
    protected RolDomainService $rolDomainService;

    public function __construct(RolDomainService $rolDomainService)
    {
        $this->rolDomainService = $rolDomainService;
    }

    public function createRol(CreateRolDTO $dto)
    {
        return $this->rolDomainService->createRol($dto);
    }

    public function getAllRoles()
    {
        return $this->rolDomainService->getAllRoles();
    }
}
