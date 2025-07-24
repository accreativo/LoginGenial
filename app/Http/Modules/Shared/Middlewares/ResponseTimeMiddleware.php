<?php

namespace App\Http\Modules\Shared\Middlewares;

use App\Http\Modules\Shared\Utils\ApiResponseUtil;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseTimeMiddleware
{
   public function handle(Request $request, Closure $next): Response
    {
        try {
            $start = microtime(true);

            /** @var Response $response */
            $response = $next($request);

            $duration = round((microtime(true) - $start) * 1000, 2);

            if (
                $response instanceof \Illuminate\Http\JsonResponse &&
                is_array($response->getData(true))
            ) {
                $data = $response->getData(true);

                $data['meta']['durationInMs'] = $duration;

                $response->setData($data);
            }

            return $response;
        } catch (\Throwable $th) {
            throw ApiResponseUtil::error($th);
        }
    }
}
