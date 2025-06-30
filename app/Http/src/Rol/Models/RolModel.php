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
        public function credenciales()
        {
            return $this->hasMany(CredencialModel::class, 'rol_id');
        }

        public function permisos()
        {
            return $this->hasMany(RolPemisoModel::class, 'rol_id');
        }

    ###CRUD
        public function crear($request)
        {
            # code...
        }

        public function actualizar($request)
        {
            # code...
        }

        public function anular($request)
        {
            # code...
        }

    ###LOGICA

    ###SCOPES

    ###ATTRIBUTES
}
