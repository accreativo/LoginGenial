<?php

namespace App\Http\src\Shared\Utils;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ApiResponseUtil
{
    /*
        | Campo     | Tipo               | Descripción                                                 |
        | --------- | ------------------ | ----------------------------------------------------------- |
        | `success` | `boolean`          | Indica si la operación fue exitosa o no                     |
        | `message` | `string`           | Mensaje humano útil y claro                                 |
        | `data`    | `object` o `array` | Información solicitada o recién creada/modificada           |
        | `errors`  | `object`           | En caso de error, incluye los detalles por campo            |
        | `meta`    | `object`           | Información adicional (timestamp, paginación, tokens, etc.) |
    */

    public static function success(array $data = [], string $message = 'Successful operation.', int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'meta' => [
                'timestamp' => now()
            ],
        ], $code);
    }

    public static function error(string $message = 'An error occurred.', array $errors = [], int $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors ?: null,
            'meta' => [
                'timestamp' => now()
            ],
        ], $code);
    }

    public static function created($data = null, string $message = 'Resource created successfully.'): JsonResponse
    {
        return self::success($data, $message, 201);
    }

    public static function unauthorized(string $message = 'You need to authenticate yourself first.'): JsonResponse
    {
        return self::error($message, [], 401);
    }

    public static function notFound(string $message = 'Resource not found.'): JsonResponse
    {
        return self::error($message, [], 404);
    }

    public static function validation($errors): HttpResponseException
    {
        return new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error.',
            'errors' => $errors,
            'meta' => [
                'timestamp' => now(),
            ],
        ], 422));
    }
}
