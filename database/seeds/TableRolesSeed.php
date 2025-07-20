<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableRolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Rol1',
            'Rol2'
        ];

        foreach ($roles as $valor){
            DB::table('roles')->insert([
                'name' => $valor
            ]);
        }
    }
}
