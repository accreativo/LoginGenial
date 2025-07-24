<?php

namespace App\Http\Modules\Authentication\Domain\Interfaces;

use App\Http\Modules\Authentication\Domain\TransferData\DTO\CreateCredentialDTO;
use App\Http\Modules\Authentication\Domain\TransferData\Resources\CreatedCredentialResource;

interface CredentialServiceInterface
{
    public function createCredential(CreateCredentialDTO $dto): CreatedCredentialResource;
    public function availableToCreateCredential(CreateCredentialDTO $dto): void;
    public function isUserInUseOnCredential(string $user): bool;
    public function isEmailInUseOnCredential(string $email): bool;
}
