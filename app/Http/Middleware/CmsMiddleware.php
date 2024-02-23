<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CmsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('cms')->check()) {
            return redirect()->route('cms.auth-cms.getLogin');
        }

        return $next($request);
    }
}
