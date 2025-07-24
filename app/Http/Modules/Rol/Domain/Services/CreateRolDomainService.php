<?php

namespace App\Http\Modules\Rol\Domain\Services;

use App\Http\Modules\Rol\Domain\Models\RolModel;
use App\Http\Modules\Rol\Domain\TransferData\DTO\CreateRolDTO;
use App\Http\Modules\Rol\Domain\TransferData\Resources\CreatedRolResource;
use App\Http\Modules\Shared\Base\Methods\BaseCreateMethod;

class CreateRolDomainService
{
    public function __construct(
        protected RolModel $rolModel
    ) { }

    public function create(CreateRolDTO $dto) : CreatedRolResource
    {
        $rol = BaseCreateMethod::create($this->rolModel, $dto->toArray());

        return new CreatedRolResource($rol);
    }
}
