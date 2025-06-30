<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableCredencialesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credenciales = [
            [
                'rol_id' => 1,
                'usuario'   => 'usuario1',
                'password'  => bcrypt('secret'),
                'correo'    => 'usuario1@dominio.com',
                'fl_estado' => TRUE,
            ],
            [
                'rol_id' => 2,
                'usuario'   => 'usuario2',
                'password'  => bcrypt('secret'),
                'correo'    => 'usuario2@dominio.com',
                'fl_estado' => TRUE,
            ]
        ];

        foreach ($credenciales as $valor){
            DB::table('credenciales')->insert([
                'rol_id' => $valor['rol_id'],
                'usuario'   => $valor['usuario'],
                'password'  => $valor['password'],
                'correo'    => $valor['correo'],
                'fl_estado' => $valor['fl_estado'],
            ]);
        }
    }
}
