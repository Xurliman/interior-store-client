<?php

namespace App\AuditResolvers;

use Illuminate\Contracts\Auth\Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Resolver;

class UserResolver implements Resolver
{
    public static function resolve(Auditable $auditable)
    {
        return auth()->user();
    }
}
