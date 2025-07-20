<?php

    namespace App\Http\src\Shared\Environments;

    class Environments
    {
        public static function HASH_PASSPORT(): string
        {
            return config('enviroments.hash_passport');
        }
    }
