<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class UsuarioModel extends Authenticatable
{
    protected $remember_token = false;
    protected $table = "usuarios";
    protected $fillable = [
        'perfil_id',
        'usuario','correo', 'password',
        'fl_estado', 'fl_recuperacion', 'fe_recuperacion',
        'tkn'
    ];
    protected $attributes = [
        'perfil_id' => 2
    ];

    public function perfil()
    {
        return $this->belongsTo(PerfilModel::class);
    }

    public function setSession($role)
    {
        if ($role->fl_estado == 1) {

            Session::put(
                [
                    'usuario_id' => $this->id,
                    'correo' => $this->correo,
                    'perfil_id' => $this->perfil->id,
                ]
            );
        }
    }
}
