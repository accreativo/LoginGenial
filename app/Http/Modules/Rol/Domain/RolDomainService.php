<?php

namespace App\Http\Modules\Rol\Domain;

use App\Http\Modules\Rol\Domain\RolServiceInterface;
use App\Http\Modules\Rol\Domain\Services\CreateRolDomainService;
use App\Http\Modules\Rol\Domain\Services\GetRolDomainService;
use App\Http\Modules\Rol\Domain\TransferData\DTO\CreateRolDTO;
use App\Http\Modules\Rol\Domain\TransferData\Resources\CreatedRolResource;
use App\Http\Modules\Rol\Domain\TransferData\Resources\GetRoleCollectionResource;

class RolDomainService implements RolServiceInterface
{
    public function __construct(
        public CreateRolDomainService $createRolDomainService,
        public GetRolDomainService $getRolDomainService,
    ) {}

    public function createRol(CreateRolDTO $dto): CreatedRolResource
    {
        return $this->createRolDomainService->create($dto);
    }

    public function getAllRoles(): GetRoleCollectionResource
    {
        return $this->getRolDomainService->getAll();
    }
}
