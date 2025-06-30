<?php

namespace App\Http\src\Rol\Models;

use App\Http\src\Rol\Models\RolModel;
use Illuminate\Database\Eloquent\Model;

class RolPemisoModel extends Model {
    ###CONFIGURACION
        protected $table = "rol_permisos";
        protected $fillable = ['id','rol_id','modulo','tkn'];

    ###RELACIONES
        public function rol()
        {
            return $this->belongsTo(RolModel::class);
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
