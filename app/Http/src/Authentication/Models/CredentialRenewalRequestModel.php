<?php

namespace App\Http\src\Authentication\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CredentialRenewalRequestModel extends Authenticatable {
    ###CONFIGURACION
        protected $table = "credentialRenewalRequests";
        protected $fillable = [
            'credentialId',
            'tknPassword', 'flStatus', 'dtRenewalRequestLimit',
            'tkn',
        ];

    ###RELACIONES
        public function credential()
        {
            return $this->belongsTo(CredentialModel::class);
        }

    ###LOGICA

    ###SCOPES

    ###ATTRIBUTES
}
