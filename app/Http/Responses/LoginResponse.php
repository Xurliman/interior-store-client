<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): JsonResponse|Response|RedirectResponse
    {
        $routeName = auth()->user()->is_admin ? 'filament.admin.pages.dashboard' : 'scenes.index';
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->route($routeName);
    }
}
