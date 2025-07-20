<?php

namespace App\Http\src\Authentication\Services;

use App\Http\src\Authentication\Enums\CredentialEvents;
use App\Http\src\Authentication\TransferData\DTO\CreateCredentialDTO;
use App\Http\src\Authentication\Models\CredentialModel;
use App\Http\src\Authentication\TransferData\Resources\CreatedCredentialResource;
use App\Http\src\Shared\Utils\ApiResponseUtil;

class CreateCredentialService
{
    public function __construct(
        protected CredentialModel $credentialModel
    ) { }

    public function setup(CreateCredentialDTO $newCredential) : CreatedCredentialResource
    {
        $this->availableToCreate($newCredential);
        $credential = $this->credentialModel->fill($newCredential->toArray());
        $credential->save();

        $credential->events()->create([
            'name' => CredentialEvents::CREDENTIAL_CREATE,
            'observation' => CredentialEvents::DEFAULT_OBSERVATION
        ]);

        return new CreatedCredentialResource($credential);
    }

    public function availableToCreate(CreateCredentialDTO $credential) : void
    {
        $isUserInUse = $this->isUserInUse($credential->user);
        $isEmailInUse = $this->isEmailInUse($credential->email);
        $availableCredential = !$isUserInUse && !$isEmailInUse;

        if (!$availableCredential) {
            $errorMessages = [];
            if ($isUserInUse) {
                $errorMessages[] = 'User in use.';
            }
            if ($isEmailInUse) {
                $errorMessages[] = 'E-mail in use.';
            }

            throw ApiResponseUtil::validation(join(', ', $errorMessages));
        }
    }

    private function isUserInUse(string $user): bool
    {
        return $this->credentialModel->where([
            ['user', '=', $user],
            ['flStatus', '=', true],
        ])->exists();
    }

    private function isEmailInUse(string $email): bool
    {
        return $this->credentialModel->where([
            ['email', '=', $email],
            ['flStatus', '=', true],
        ])->exists();
    }
}
