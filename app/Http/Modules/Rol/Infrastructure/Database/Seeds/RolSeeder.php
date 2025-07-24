<?php

namespace App\Http\Modules\Rol\Infrastructure\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Http\Modules\Rol\Infrastructure\Database\Seeds\TableRolesSeed;

class RolSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TableRolesSeed::class);
    }
}
