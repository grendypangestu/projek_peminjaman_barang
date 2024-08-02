<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FilterAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $currentPath = '/' . $request->path(); // Format path with leading slash

        Log::info("User: {$user->email}, Requested Path: $currentPath");

        // Skip checking access for POST requests to /status-permohonan/izin and /status-permohonan/tolak
        if ($request->is('status_permohonan/*/izin') || $request->is('status_permohonan/*/tolak') || 
            $request->is('barang/*')) {
            return $next($request);
        }

        $hasAccess = DB::table('dbFlMenuWeb')
            ->where('USERID', $user->email)
            ->where('pathfile', $currentPath)
            ->where('HASACCESS', 1)
            ->exists();

        if (!$hasAccess) {
            Log::warning("Access denied for path: $currentPath, redirecting to home");
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
