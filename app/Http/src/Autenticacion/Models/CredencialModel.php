<?php

namespace App\Http\src\Autenticacion\Models;

use App\Http\src\Autenticacion\Enums\CredencialEventos;
use App\Http\src\Rol\Models\RolModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CredencialModel extends Authenticatable {
    ###CONFIGURACION
        protected $table = "credenciales";
        protected $fillable = [
            'id', 'tkn', 'perfil_id',
            'usuario', 'password', 'correo',
            'fl_login', 'fe_login',
            'fl_recuperacion', 'fe_recuperacion',
            'codigo', 'fe_codigo', 'codigo_accion', 'session'
        ];
        protected $attributes = [
            'perfil_id' => 2
        ];

    ###RELACIONES
        public function perfil()
        {
            return $this->belongsTo(RolModel::class);
        }

        public function renovacionSolicitudes()
        {
            return $this->hasMany(CredencialRenovacionSolicitudModel::class, 'credencial_id');
        }

        public function autorizacionSolicitudes()
        {
            return $this->hasMany(CredencialAutorizacionSolicitudModel::class, 'credencial_id');
        }

        public function eventos()
        {
            return $this->hasMany(CredencialEventoModel::class, 'credencial_id');
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
                'password' => bcrypt($password),
            ]);

            $this->renovacionSolicitudes()->firstWhere('fl_estado', true)->update([
                'fl_estado' => false,
            ]);

            $this->eventos()->create([
                'evento' => CredencialEventos::RENOVACION_CREDENCIAL,
                'obervacion' => CredencialEventos::OBSERVACION_DEFAULT
            ]);
        }

        public function solicitudRenovacionCredencial()
        {
            $this->renovacionSolicitudes()->create([
                'fl_recuperacion' => true,
                'tkn_password' => bcrypt($this->tkn.'-'.date("Y-m-d H:i:s")),
                'fe_recuperacion' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")."+ 4 hour"))
            ]);

            $this->eventos()->create([
                'evento' => CredencialEventos::SOLICITUD_RENOVACION_CREDENCIAL,
                'obervacion' => CredencialEventos::OBSERVACION_DEFAULT
            ]);
        }

        public function solicitudAutorizacionCredencial()
        {
            // $this->autorizacionSolicitudes()->create([

            // ]);

            $this->eventos()->create([
                'evento' => CredencialEventos::SOLICITUD_AUTORIZACION_CREDENCIAL,
                'obervacion' => CredencialEventos::OBSERVACION_DEFAULT
            ]);
        }

        public function setSession($credencial)
        {
            $this->eventos()->create([
                'evento' => CredencialEventos::LOGIN_CREDENCIAL,
                'obervacion' => CredencialEventos::OBSERVACION_DEFAULT
            ]);
        }

    ###SCOPES

    ###ATTRIBUTES
}
