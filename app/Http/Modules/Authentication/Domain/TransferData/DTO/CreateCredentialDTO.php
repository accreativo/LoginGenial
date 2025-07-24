<?php

namespace App\Http\Modules\Authentication\Domain\TransferData\DTO;

use InvalidArgumentException;

class CreateCredentialDTO
{
    public array $data;
    public string $user;
    public string $email;
    public string $password;

    public function __construct(array $data)
    {
        if (!isset($data['user'], $data['email'], $data['password'])) {
            throw new InvalidArgumentException("Missing required fields.");
        }

        $this->user = $data['user'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    public function toArray(): array
    {
        return [
            'user'     => $this->user,
            'email'    => $this->email,
            'password' => $this->password,
        ];
    }
}
