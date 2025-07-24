<?php

namespace App\Http\Modules\Shared\Base\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseCreateEntity extends JsonResource
{
    protected function baseFields(): array
    {
        return [
            'id'             => $this->id,
            'tkn'            => $this->tkn,
            'createDateTime' => $this->createdDateTime?->toDateTimeString(),
        ];
    }
}
