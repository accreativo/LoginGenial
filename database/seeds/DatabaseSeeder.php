<?php

use App\Http\Modules\Authentication\Infrastructure\Database\Seeds\AuthenticationSeeder;
use App\Http\Modules\Rol\Infrastructure\Database\Seeds\RolSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            AuthenticationSeeder::class,
        ]);
    }
}
