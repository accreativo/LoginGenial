<?php

namespace App\Http\src\Authentication\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CredentialEventModel extends Authenticatable {
    ###CONFIGURACION
        protected $table = "credentialEvents";
        protected $fillable = [
            'credentialId',
            'name', 'observation'
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
