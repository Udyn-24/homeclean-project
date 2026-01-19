<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Periksa apakah user memiliki role yang sesuai
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses
        return redirect()->route('home')
            ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}