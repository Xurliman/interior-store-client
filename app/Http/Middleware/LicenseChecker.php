<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use MongoDB\Driver\Exception\ConnectionTimeoutException;
use Symfony\Component\HttpFoundation\Response;

class LicenseChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $response = \Illuminate\Support\Facades\Http::post('http://127.0.0.1:8001/api/validate-license', [
                'license_key' => config('license.license_key'),
            ]);

            if ($response->failed() || $response->json('status') !== 'active') {
                return response()->view('auth.license-expired');
            }
            return $next($request);
        } catch (ConnectionException $exception) {
            return response()->view('auth.license-expired');
        }



    }
}
