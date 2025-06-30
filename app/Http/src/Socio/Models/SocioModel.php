<?php

namespace App\Http\src\Socio\Models;

use Illuminate\Database\Eloquent\Model;

class SocioModel extends Model {
    ###CONFIGURACION
        protected $table = "socios";
        protected $fillable = ['id','tkn'];

    ###RELACIONES

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