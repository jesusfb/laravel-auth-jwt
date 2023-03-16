<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\ApiHelpers;
use App\Helpers\JWTHelpers;
use Exception;

class apiGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $bearerToken = $request->bearerToken();

            if ($bearerToken) {
                // Decode token
                JWTHelpers::decode($bearerToken);

                return $next($request);
            } else {
                return ApiHelpers::resApi(401, 'Access Unauthorized');
            }
        } catch (Exception $error) {
            return ApiHelpers::resApi(401, $error->getMessage());
        }
    }
}
