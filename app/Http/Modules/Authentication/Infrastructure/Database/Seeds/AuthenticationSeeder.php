<?php

namespace App\Http\Modules\Authentication\Infrastructure\Database\Seeds;

use App\Http\Modules\Authentication\Infrastructure\Database\Seeds\TableCredentialsSeed;
use Illuminate\Database\Seeder;

class AuthenticationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TableCredentialsSeed::class);
    }
}
