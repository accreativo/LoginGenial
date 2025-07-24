<?php

namespace App\Http\Modules\Authentication\Infrastructure\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableCredentialsSeed extends Seeder
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
                'rolId' => 1,
                'user'   => 'user1',
                'password'  => bcrypt('secret'),
                'email'    => 'user1@dominio.com',
                'flStatus' => TRUE,
            ],
            [
                'rolId' => 2,
                'user'   => 'user2',
                'password'  => bcrypt('secret'),
                'email'    => 'user2@dominio.com',
                'flStatus' => TRUE,
            ]
        ];

        foreach ($credenciales as $valor){
            DB::table('credentials')->insert([
                'rolId' => $valor['rolId'],
                'user'   => $valor['user'],
                'password'  => $valor['password'],
                'email'    => $valor['email'],
                'flStatus' => $valor['flStatus'],
            ]);
        }
    }
}
