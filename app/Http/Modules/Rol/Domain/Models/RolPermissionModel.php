<?php

namespace App\Http\Modules\Rol\Domain\Models;

use App\Http\Modules\Shared\Base\Model\BaseCustomModel;

class RolPermissionModel extends BaseCustomModel
{
    ###CONFIGURACION
        protected $table = "rolPermissions";
        protected $fillable = [
            'id','rolId','module','tkn'
        ];

    ###RELACIONES
        public function rol()
        {
            return $this->belongsTo(RolModel::class);
        }

    ###LOGICA

    ###SCOPES

    ###ATTRIBUTES
}
