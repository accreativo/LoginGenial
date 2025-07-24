<?php

namespace App\Http\Modules\Rol\Domain\Models;

use App\Http\Modules\Shared\Base\Model\BaseCustomModel;

class RolModel extends BaseCustomModel
{
    ###CONFIGURACION
        protected $table = "roles";
        protected $fillable = [
            'id','name', 'tkn'
        ];

    ###RELACIONES
        public function permissions()
        {
            return $this->hasMany(RolPermissionModel::class, 'rolId', 'id');
        }

    ###LOGICA

    ###SCOPES

    ###ATTRIBUTES
}
