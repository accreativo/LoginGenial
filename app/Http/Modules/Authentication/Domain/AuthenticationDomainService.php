<?php

namespace App\Http\Modules\Authentication\Domain;

use App\Http\Modules\Authentication\Domain\AuthenticationServiceInterface;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\CreateCredentialDTO;
use App\Http\Modules\Authentication\Domain\TransferData\Resources\CreatedCredentialResource;
use App\Http\Modules\Authentication\Domain\TransferData\Resources\LoggedCredentialResource;
use App\Http\Modules\Authentication\Domain\Services\CreateCredentialDomainService;
use App\Http\Modules\Authentication\Domain\Services\LoginCredentialDomainService;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\LoginCredentialDTO;

class AuthenticationDomainService implements AuthenticationServiceInterface
{
    public function __construct(
        public CreateCredentialDomainService $createCredentialDomainService,
        public LoginCredentialDomainService $loginCredentialDomainService,
    ) {}

    public function login(LoginCredentialDTO $credential) : LoggedCredentialResource
    {
        return $this->loginCredentialDomainService->login($credential);
    }

    public function createCredential(CreateCredentialDTO $dto): CreatedCredentialResource
    {
        return $this->createCredentialDomainService->create($dto);
    }

    public function availableToCreateCredential(CreateCredentialDTO $dto): void
    {
        $this->createCredentialDomainService->availableToCreate($dto);
    }

    public function isUserInUseOnCredential(string $user): bool
    {
        return $this->createCredentialDomainService->isUserInUse($user);
    }

    public function isEmailInUseOnCredential(string $email): bool
    {
        return $this->createCredentialDomainService->isEmailInUse($email);
    }
}
