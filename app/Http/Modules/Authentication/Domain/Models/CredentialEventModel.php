<?php

namespace App\Http\Modules\Authentication\Domain\Models;

use App\Http\Modules\Shared\Base\Model\BaseCustomModel;

class CredentialEventModel extends BaseCustomModel
{
    ###CONFIGURACION
        protected $table = "credentialEvents";
        protected $fillable = [
            'id', 'credentialId',
            'name', 'observation', 'tkn'
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
