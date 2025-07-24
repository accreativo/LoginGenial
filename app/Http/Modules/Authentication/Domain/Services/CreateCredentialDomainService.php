<?php

namespace App\Http\Modules\Authentication\Domain\Services;

use App\Http\Modules\Authentication\Domain\Enums\CredentialEventsEnum;
use App\Http\Modules\Authentication\Domain\TransferData\DTO\CreateCredentialDTO;
use App\Http\Modules\Authentication\Domain\Models\CredentialModel;
use App\Http\Modules\Authentication\Domain\TransferData\Resources\CreatedCredentialResource;
use App\Http\Modules\Shared\Base\Methods\BaseCreateMethod;
use App\Http\Modules\Shared\Utils\ApiResponseUtil;

class CreateCredentialDomainService
{
    public function __construct(
        protected CredentialModel $credentialModel
    ) { }

    public function create(CreateCredentialDTO $dto) : CreatedCredentialResource
    {
        $this->availableToCreate($dto);
        $credential = BaseCreateMethod::create($this->credentialModel, $dto->toArray());

        $credential->events()->create([
            'name' => CredentialEventsEnum::CREDENTIAL_CREATE,
            'observation' => CredentialEventsEnum::DEFAULT_OBSERVATION
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

    public function isUserInUse(string $user): bool
    {
        return $this->credentialModel->where([
            ['user', '=', $user],
            ['flStatus', '=', true],
        ])->exists();
    }

    public function isEmailInUse(string $email): bool
    {
        return $this->credentialModel->where([
            ['email', '=', $email],
            ['flStatus', '=', true],
        ])->exists();
    }
}
