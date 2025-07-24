<?php

namespace App\Http\Modules\Authentication\Domain\TransferData\Resources;

use App\Http\Modules\Authentication\Domain\Enums\CredentialConfigurationsEnum;
use App\Http\Modules\Shared\Utils\DateTimeUtil;
use Illuminate\Http\Resources\Json\JsonResource;

class LoggedCredentialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'access_token' => $this->accessToken,
            'login_at'     => DateTimeUtil::baseTime(),
            'expires_at'   => DateTimeUtil::adjustTimeInMinutes(CredentialConfigurationsEnum::EXPIRES_AT),
        ];
    }
}
