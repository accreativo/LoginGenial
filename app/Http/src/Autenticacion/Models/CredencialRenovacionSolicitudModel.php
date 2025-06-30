<?php

namespace App\Http\src\Autenticacion\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CredencialRenovacionSolicitudModel extends Authenticatable {
    ###CONFIGURACION
        protected $table = "credencial_renovacion_solicitudes";
        protected $fillable = [
            'credencial_id',
            'tkn_password', 'fl_estado', 'fe_recuperacion',
            'tkn',
        ];

    ###RELACIONES
        public function crdencial()
        {
            return $this->belongsTo(CredencialModel::class);
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
