<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsBanned
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->doctor && auth()->user()->doctor->is_banned) {
            return redirect()->back()->with('error', 'You are banned!');
        }

        return $next($request);
    }
}
