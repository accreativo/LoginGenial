<?php

namespace App\Http\Modules\Authentication\Domain\Models;

use App\Http\Modules\Shared\Base\Model\BaseCustomModel;
use App\Http\Modules\Shared\Constants\CustomTimestampsActions;

class CredentialAuthorizationRequestModel extends BaseCustomModel
{
    use CustomTimestampsActions;

    ###CONFIGURACION
        protected $table = "credentialAuthorizationRequests";
        protected $fillable = [
            'id', 'credentialId',
            'code', 'dateTimeLimitToUseCode',
            'action', 'session', 'tkn'
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
