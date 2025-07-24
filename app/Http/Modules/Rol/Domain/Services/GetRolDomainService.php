<?php

namespace App\Http\Modules\Rol\Domain\Services;

use App\Http\Modules\Rol\Domain\Models\RolModel;
use App\Http\Modules\Rol\Domain\TransferData\Resources\GetRoleCollectionResource;

class GetRolDomainService
{
    public function __construct(
        protected RolModel $rolModel
    ) { }

    public function getAll() : GetRoleCollectionResource
    {
        $roles = $this->rolModel->all();
        return new GetRoleCollectionResource($roles);
    }
}
