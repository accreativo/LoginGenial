<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilModel extends Model
{
    ###CONFIGURACION
        protected $table = "perfiles";
        protected $fillable = ['nombre','fl_estado', 'tkn'];

    ###RELACIONES
        public function usuarios()
        {
            return $this->hasMany(UsuarioModel::class, 'perfil_id');
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

    ###
}
