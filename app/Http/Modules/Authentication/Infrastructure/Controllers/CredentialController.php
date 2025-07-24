<?php

namespace App\Http\Modules\Authentication\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Authentication\Application\AuthenticationUseCases;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\CreateCredentialDTO;
use App\Http\Modules\Authentication\Infrastructure\Requests\CreateCredentialRequest;
use App\Http\Modules\Shared\Utils\ApiResponseUtil;

class CredentialController extends Controller
{
    protected AuthenticationUseCases $authenticationUseCases;

    public function __construct(AuthenticationUseCases $authenticationUseCases)
    {
        $this->authenticationUseCases = $authenticationUseCases;
    }

    function create(CreateCredentialRequest $request)
    {
        $newCredential = new CreateCredentialDTO($request->credential);
        $credentialCreated = $this->authenticationUseCases->createCredential($newCredential);
        return ApiResponseUtil::created($credentialCreated);
    }
}
