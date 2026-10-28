<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('member.login');
        }

        if (auth()->user()->role !== 'member') {
            abort(403, 'Members only.');
        }

        return $next($request);
    }
}