<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        // User must be logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Only organization administrators can access admin pages
        if (auth()->user()->role !== 'organization_admin') {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}