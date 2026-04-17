<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $authUserRole = auth()->user()->role;

        if ($authUserRole == $role) {
            return $next($request);
        }
        return match ($authUserRole) {
            2 => redirect()->route('admin.dashboard')->with('error', 'You were redirected to Admin area.'),
            1 => redirect()->route('seller.dashboard')->with('error', 'Access denied to that section.'),
            0 => redirect()->route('dashboard')->with('error', 'You do not have permission to view that page.'),
            default => redirect()->route('login'),
        };
    }
}
