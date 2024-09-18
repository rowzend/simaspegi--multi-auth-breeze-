<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->mode == 'admin') {
            return $next($request);
        } elseif (Auth::user()->mode == 'approval') {
            // Logika untuk user dengan role approval
            return $next($request);
        } elseif (Auth::user()->mode == 'verifikator') {
            // Logika untuk user dengan role verifikator
            return $next($request);
        } elseif (Auth::user()->mode == 'user') {
            // Logika untuk user biasa
            return $next($request);
        }

        return redirect()->back();
    }
}
