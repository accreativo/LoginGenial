<?php

namespace App\Http\Modules\Shared\Base\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseGetEntityResource extends JsonResource
{
    protected function baseFields(): array
    {
        return [
            'tkn'            => $this->tkn,
            'createDateTime' => $this->createdDateTime?->toDateTimeString(),
            'isActive'       => $this->deletedDateTime ? false : true,
        ];
    }
}
