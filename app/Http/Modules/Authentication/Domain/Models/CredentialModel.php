<?php

namespace App\Http\Modules\Authentication\Domain\Models;

use App\Http\Modules\Authentication\Domain\Enums\CredentialEventsEnum;
use App\Http\Modules\Shared\Base\Model\BaseCustomAuthenticatableModel;
use App\Http\Modules\Shared\Utils\DateTimeUtil;
use Laravel\Passport\HasApiTokens;

class CredentialModel extends BaseCustomAuthenticatableModel
{
    use HasApiTokens;

    ###CONFIGURACION
        protected $table = "credentials";
        protected $fillable = [
            'id', 'rolId',
            'user', 'password', 'email',
            'isAuthorized', 'tkn'
        ];
        protected $attributes = [
            'rolId' => 2
        ];

    ###RELACIONES
        // public function rol()
        // {
        //     return $this->belongsTo(RolModel::class);
        // }

        public function renewalRequests()
        {
            return $this->hasMany(CredentialRenewalRequestModel::class, 'credentialId', 'id');
        }

        public function authorizationRequests()
        {
            return $this->hasMany(CredentialAuthorizationRequestModel::class, 'credentialId', 'id');
        }

        public function events()
        {
            return $this->hasMany(CredentialEventModel::class, 'credentialId', 'id');
        }

    ###LOGICA
        public function renewalPassword($password)
        {
            $this->update([
                'password' => bcrypt($password),
            ]);

            $this->renewalRequests()->firstWhere('isCurrent', true)->update([
                'isCurrent' => false,
            ]);

            $this->events()->create([
                'event' => CredentialEventsEnum::RENEWAL_CREDENTIAL,
                'observation' => CredentialEventsEnum::DEFAULT_OBSERVATION
            ]);
        }

        public function createRenewalRequest()
        {
            $this->renewalRequests()->firstWhere('isCurrent', true)->update([
                'isCurrent' => false,
            ]);

            $this->renewalRequests()->create([
                'isCurrent'  => true,
                'tknPassword' => bcrypt($this->tkn.'-'.DateTimeUtil::baseTime()),
                'dtRenewalRequestLimit' => DateTimeUtil::adjustTimeInHours(hours:4)
            ]);

            $this->events()->create([
                'name' => CredentialEventsEnum::CREDENTIAL_RENEWAL_REQUEST,
                'observation' => CredentialEventsEnum::DEFAULT_OBSERVATION
            ]);
        }

        public function createAuthorizationRequest()
        {
            // $this->autorizacionSolicitudes()->create([

            // ]);

            $this->events()->create([
                'name' => CredentialEventsEnum::CREDENTIAL_AUTHORIZATION_REQUEST,
                'observation' => CredentialEventsEnum::DEFAULT_OBSERVATION
            ]);
        }

    ###SCOPES

    ###ATTRIBUTES
}
