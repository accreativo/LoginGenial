<?php

namespace App\Http\Modules\Authentication\Domain\Services;

use App\Http\Modules\Authentication\Domain\Enums\CredentialEventsEnum;
use App\Http\Modules\Authentication\Domain\Models\CredentialModel;
use App\Http\Modules\Authentication\Domain\TransferData\Resources\LoggedCredentialResource;
use App\Http\Modules\Shared\Environments\Environments;

class LoginCredentialDomainService
{
    public function __construct(
        protected CredentialModel $credentialModel
    ) { }

    public function login(CredentialModel $credential) : LoggedCredentialResource
    {
        $tokenResult = $credential->createToken(Environments::HASH_PASSPORT());

        $credential->events()->create([
            'name'         => CredentialEventsEnum::CREDENTIAL_LOGIN,
            'observation'  => CredentialEventsEnum::DEFAULT_OBSERVATION
        ]);

        return new LoggedCredentialResource($tokenResult);
    }
}
