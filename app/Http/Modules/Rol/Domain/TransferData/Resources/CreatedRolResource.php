<?php

namespace App\Http\Modules\Rol\Domain\TransferData\Resources;

use App\Http\Modules\Shared\Base\Resource\BaseCreateEntity;

class CreatedRolResource extends BaseCreateEntity
{
    public function toArray($request)
    {
        return array_merge([
            'name' => $this->name,
        ], $this->baseFields());
    }
}

