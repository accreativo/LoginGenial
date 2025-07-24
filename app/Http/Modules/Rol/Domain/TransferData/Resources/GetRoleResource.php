<?php

namespace App\Http\Modules\Rol\Domain\TransferData\Resources;

use App\Http\Modules\Shared\Base\Resource\BaseGetEntityResource;

class GetRoleResource extends BaseGetEntityResource
{
    public function toArray($request)
    {
        return array_merge([
            'id'   => $this->id,
            'name' => $this->name,
        ], $this->baseFields());
    }
}
