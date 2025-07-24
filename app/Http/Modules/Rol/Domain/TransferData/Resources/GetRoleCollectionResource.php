<?php

namespace App\Http\Modules\Rol\Domain\TransferData\Resources;

use App\Http\Modules\Shared\Base\Resource\BaseGetEntityCollectionResource;

class GetRoleCollectionResource extends BaseGetEntityCollectionResource
{
    protected string $resourceClass = GetRoleResource::class;
}
