<?php

namespace App\Http\Modules\Shared\Utils;


class ValidInputFormatUtil
{
    public static function isValidFormat(string $type, $input): bool
    {
        switch ($type) {
            case 'email':
                $hasFormat = preg_match('/^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]{2,}$/', $input);
                break;

            case 'dni':
                $hasFormat = preg_match('/^\d{8}$/', $input); // ejemplo Perú
                break;

            case 'phone':
                $hasFormat = preg_match('/^\+?\d{9,15}$/', $input); // formato internacional
                break;

            default:
                $hasFormat = false;

        }
        $isValidFormat = (bool)$hasFormat;

        return $isValidFormat;
    }
}
