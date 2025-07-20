<?php

namespace App\Http\src\Rol\Models;

use App\Http\src\Rol\Models\RolModel;
use Illuminate\Database\Eloquent\Model;

class RolPermissionModel extends Model {
    ###CONFIGURACION
        protected $table = "rolPermissions";
        protected $fillable = ['id','rol_id','module','tkn'];

    ###RELACIONES
        public function rol()
        {
            return $this->belongsTo(RolModel::class);
        }

    ###LOGICA

    ###SCOPES

    ###ATTRIBUTES
}
