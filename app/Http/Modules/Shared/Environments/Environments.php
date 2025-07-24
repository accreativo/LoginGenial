<?php

    namespace App\Http\Modules\Shared\Environments;

    class Environments
    {
        public static function HASH_PASSPORT(): string
        {
            return config('enviroments.hash_passport');
        }
    }
