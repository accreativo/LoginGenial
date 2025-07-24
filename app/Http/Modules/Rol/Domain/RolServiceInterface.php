<?php

namespace App\Http\Modules\Rol\Domain;

use App\Http\Modules\Rol\Domain\TransferData\DTO\CreateRolDTO;
use App\Http\Modules\Rol\Domain\TransferData\Resources\CreatedRolResource;
use App\Http\Modules\Rol\Domain\TransferData\Resources\GetRoleCollectionResource;

interface RolServiceInterface
{
    public function createRol(CreateRolDTO $dto): CreatedRolResource;
    public function getAllRoles(): GetRoleCollectionResource;
}
