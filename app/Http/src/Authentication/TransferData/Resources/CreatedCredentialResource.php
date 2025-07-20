<?php

namespace App\Http\src\Authentication\TransferData\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreatedCredentialResource extends JsonResource
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
            'item' => [
                'id'         => $this->id,
                'user'       => $this->user,
                'email'      => $this->email,
                'created_at' => $this->created_at?->toDateTimeString(),
                'updated_at' => $this->updated_at?->toDateTimeString(),
            ]
        ];
    }
}
