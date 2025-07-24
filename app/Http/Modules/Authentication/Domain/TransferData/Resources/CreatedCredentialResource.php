<?php

namespace App\Http\Modules\Authentication\Domain\TransferData\Resources;

use App\Http\Modules\Shared\Base\Resource\BaseCreateEntity;

class CreatedCredentialResource extends BaseCreateEntity
{
    public function toArray($request)
    {
        return array_merge([
            'user'       => $this->user,
            'email'      => $this->email,
        ], $this->baseFields());
    }
}
