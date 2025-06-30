<?php

namespace App\Http\src\Autenticacion\Models;

use App\Http\src\Perfil\PerfilModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CredencialEventoModel extends Authenticatable {
    ###CONFIGURACION
        protected $table = "credencial_eventos";
        protected $fillable = [
            'credencial_id',
            'evento', 'obervacion'
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
        public function renovacionCredencial($password)
        {
            $this->update([
                'password'        => bcrypt($password),
                'tkn_password'    => bcrypt(env('HASH').$password.time()),
                'fl_recuperacion' => false,
                'fe_recuperacion' => null
            ]);
        }

        public function solicitudRenovacionCredencial()
        {
            $this->update([
                'fl_recuperacion' => true,
                'fe_recuperacion' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")."+ 4 hour"))
            ]);
        }

        public function setSession($credencial)
        {

        }

    ###SCOPES

    ###ATTRIBUTES
}
