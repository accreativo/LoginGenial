<?php

namespace App\Http\src\Rol\Models;

use App\Http\src\Autenticacion\Models\CredencialModel;
use Illuminate\Database\Eloquent\Model;

class RolModel extends Model
{
    ###CONFIGURACION
        protected $table = "roles";
        protected $fillable = ['nombre','fl_estado'];

    ###RELACIONES
        public function permissions()
        {
            return $this->hasMany(RolPermissionModel::class, 'rol_id');
        }

    ###LOGICA

    ###SCOPES

    ###ATTRIBUTES
}
