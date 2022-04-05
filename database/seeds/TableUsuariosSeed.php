<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableUsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'perfil_id' => 1,
                'usuario'   => 'usuario1',
                'password'  => bcrypt('secret'),
                'correo'    => 'usuario1@dominio.com',
                'fl_estado' => TRUE,
            ],
            [
                'perfil_id' => 2,
                'usuario'   => 'usuario2',
                'password'  => bcrypt('secret'),
                'correo'    => 'usuario2@dominio.com',
                'fl_estado' => TRUE,
            ]
        ];

        foreach ($usuarios as $valor){
            DB::table('usuarios')->insert([
                'perfil_id' => $valor['perfil_id'],
                'usuario'   => $valor['usuario'],
                'password'  => $valor['password'],
                'correo'    => $valor['correo'],
                'fl_estado' => $valor['fl_estado'],
            ]);
        }
    }
}
