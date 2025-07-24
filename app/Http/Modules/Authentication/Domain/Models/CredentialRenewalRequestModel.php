<?php

namespace App\Http\Modules\Authentication\Domain\Models;

use App\Http\Modules\Shared\Base\Model\BaseCustomModel;
use App\Http\Modules\Shared\Constants\CustomTimestampsActions;

class CredentialRenewalRequestModel extends BaseCustomModel
{
    use CustomTimestampsActions;

    ###CONFIGURACION
        protected $table = "credentialRenewalRequests";
        protected $fillable = [
            'id', 'credentialId',
            'tknPassword', 'isCurrent', 'DateTimeLimitToRenmewalCredential',
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
