<?php

namespace App\Http\Modules\Authentication\Domain;

use App\Http\Modules\Authentication\Domain\Interfaces\CredentialServiceInterface;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\LoginCredentialDTO;
use App\Http\Modules\Authentication\Domain\TransferData\Resources\LoggedCredentialResource;

interface AuthenticationServiceInterface extends CredentialServiceInterface
{
    public function login(LoginCredentialDTO $credential): LoggedCredentialResource;
}
