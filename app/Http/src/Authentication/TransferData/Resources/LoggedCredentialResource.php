<?php

namespace App\Http\src\Authentication\TransferData\Resources;

use App\Http\src\Authentication\Enums\CredentialConfigurations;
use App\Http\src\Shared\Utils\DateTimeUtil;
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
            'expires_at'   => DateTimeUtil::adjustTimeInMinutes(CredentialConfigurations::EXPIRES_AT),
        ];
    }
}
