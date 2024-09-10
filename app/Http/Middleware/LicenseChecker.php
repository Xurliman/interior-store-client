<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class LicenseChecker
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $licensingServerUrl = config('license.licensing_server_url');
            $response = Http::post("$licensingServerUrl/api/validate-license", [
                'license_key' => config('license.license_key'),
                'store_id' => config('license.store_id'),
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
