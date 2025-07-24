<?php

namespace App\Http\Modules\Authentication\Application;

use App\Http\Modules\Authentication\Domain\TransferData\DTO\CreateCredentialDTO;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\LoginCredentialDTO;

class AuthenticationUseCases
{
    protected AuthenticationApplicationService $authenticationApplicationService;

    public function __construct(AuthenticationApplicationService $authenticationApplicationService)
    {
        $this->authenticationApplicationService = $authenticationApplicationService;
    }

    public function login(LoginCredentialDTO $request)
    {
        return $this->authenticationApplicationService->login($request);
    }

    public function createCredential(CreateCredentialDTO $request)
    {
        return $this->authenticationApplicationService->createCredential($request);
    }

    public function availableToCreateCredential(CreateCredentialDTO $dto): void
    {
        $this->authenticationApplicationService->availableToCreateCredential($dto);
    }

    public function isUserInUseOnCredential(string $user): bool
    {
        return $this->authenticationApplicationService->isUserInUseOnCredential($user);
    }

    public function isEmailInUseOnCredential(string $email): bool
    {
        return $this->authenticationApplicationService->isEmailInUseOnCredential($email);
    }
}
