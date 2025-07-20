<?php

namespace App\Http\src\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Http\src\Authentication\Requests\CreateCredentialRequest;
use App\Http\src\Authentication\TransferData\DTO\CreateCredentialDTO;
use App\Http\src\Shared\Utils\ApiResponseUtil;
use App\Http\src\Authentication\Services\CreateCredentialService;

class CredentialController extends Controller
{
    protected CreateCredentialService $createCredentialService;

    public function __construct(CreateCredentialService $createCredentialService)
    {
        $this->createCredentialService = $createCredentialService;
    }

    function create(CreateCredentialRequest $request)
    {
        $newCredential = new CreateCredentialDTO($request->credential);

        $credentialCreated = $this->createCredentialService->setup($newCredential);

        return ApiResponseUtil::created($credentialCreated);
    }
}
