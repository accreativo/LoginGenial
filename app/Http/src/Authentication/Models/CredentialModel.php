<?php

namespace App\Http\src\Authentication\Models;

use App\Http\src\Authentication\Enums\CredentialEvents;
use App\Http\src\Rol\Models\RolModel;
use App\Http\src\Shared\Utils\DateTimeUtil;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class CredentialModel extends Authenticatable
{
    use HasApiTokens;

    ###CONFIGURACION
        protected $table = "credentials";
        protected $fillable = [
            'id', 'rolId',
            'user', 'password', 'email',
            'flStatus', 'tkn'
        ];
        protected $attributes = [
            'rolId' => 2
        ];

    ###RELACIONES
        public function rol()
        {
            return $this->belongsTo(RolModel::class);
        }

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

            $this->renewalRequests()->firstWhere('flStatus', true)->update([
                'flStatus' => false,
            ]);

            $this->events()->create([
                'event' => CredentialEvents::RENEWAL_CREDENTIAL,
                'observation' => CredentialEvents::DEFAULT_OBSERVATION
            ]);
        }

        public function createRenewalRequest()
        {
            $this->renewalRequests()->firstWhere('flStatus', true)->update([
                'flStatus' => false,
            ]);

            $this->renewalRequests()->create([
                'flStatus'  => true,
                'tknPassword' => bcrypt($this->tkn.'-'.DateTimeUtil::baseTime()),
                'dtRenewalRequestLimit' => DateTimeUtil::adjustTimeInHours(hours:4)
            ]);

            $this->events()->create([
                'name' => CredentialEvents::CREDENTIAL_RENEWAL_REQUEST,
                'observation' => CredentialEvents::DEFAULT_OBSERVATION
            ]);
        }

        public function createAuthorizationRequest()
        {
            // $this->autorizacionSolicitudes()->create([

            // ]);

            $this->events()->create([
                'name' => CredentialEvents::CREDENTIAL_AUTHORIZATION_REQUEST,
                'observation' => CredentialEvents::DEFAULT_OBSERVATION
            ]);
        }

    ###SCOPES

    ###ATTRIBUTES
}
