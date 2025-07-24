<?php

namespace App\Http\Modules\Authentication\Application;

use App\Http\Modules\Authentication\Domain\AuthenticationDomainService;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\CreateCredentialDTO;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\LoginCredentialDTO;

class AuthenticationApplicationService
{
    protected AuthenticationDomainService $authenticationDomainService;

    public function __construct(AuthenticationDomainService $authenticationDomainService)
    {
        $this->authenticationDomainService = $authenticationDomainService;
    }

    public function login(LoginCredentialDTO $credential)
    {
        return $this->authenticationDomainService->login($credential);
    }

    public function createCredential(CreateCredentialDTO $request)
    {
        return $this->authenticationDomainService->createCredential($request);
    }

    public function availableToCreateCredential(CreateCredentialDTO $dto): void
    {
        $this->authenticationDomainService->availableToCreateCredential($dto);
    }

    public function isUserInUseOnCredential(string $user): bool
    {
        return $this->authenticationDomainService->isUserInUseOnCredential($user);
    }

    public function isEmailInUseOnCredential(string $email): bool
    {
        return $this->authenticationDomainService->isEmailInUseOnCredential($email);
    }
}
