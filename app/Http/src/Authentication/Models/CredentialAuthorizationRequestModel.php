<?php

namespace App\Http\src\Authentication\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CredentialAuthorizationRequestModel extends Authenticatable {
    ###CONFIGURACION
        protected $table = "credentialAuthorizationRequests";
        protected $fillable = [
            'credentialId',
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
