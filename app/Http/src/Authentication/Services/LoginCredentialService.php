<?php

namespace App\Http\src\Authentication\Services;

use App\Http\src\Authentication\Enums\CredentialEvents;
use App\Http\src\Authentication\Models\CredentialModel;
use App\Http\src\Authentication\TransferData\Resources\LoggedCredentialResource;
use App\Http\src\Shared\Environments\Environments;

class LoginCredentialService
{
    public function __construct(
        protected CredentialModel $credentialModel
    ) { }

    public function login($credential) : LoggedCredentialResource
    {
        $tokenResult = $credential->createToken(Environments::HASH_PASSPORT());

        $credential->events()->create([
            'name'         => CredentialEvents::CREDENTIAL_LOGIN,
            'observation'  => CredentialEvents::DEFAULT_OBSERVATION
        ]);

        return new LoggedCredentialResource($tokenResult);
    }

}
