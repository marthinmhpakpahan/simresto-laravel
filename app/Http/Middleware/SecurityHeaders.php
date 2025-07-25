<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=()');

        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self'; " .
                "style-src 'self' https://fonts.googleapis.com 'unsafe-inline'; " .
                "font-src 'self' https://fonts.gstatic.com data:; " .
                "script-src 'self' https://buttons.github.io 'unsafe-inline';"
        );
        return $response;
    }
}
