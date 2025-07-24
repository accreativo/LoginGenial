<?php

namespace App\Http\Modules\Rol\Domain\TransferData\DTO;

use InvalidArgumentException;

class CreateRolDTO
{
    public array $data;
    public string $name;

    public function __construct(array $data)
    {
        if (!isset($data['name'])) {
            throw new InvalidArgumentException("Missing required fields.");
        }

        $this->name = $data['name'];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
