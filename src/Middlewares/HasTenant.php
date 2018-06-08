<?php namespace Nano7\Tenants\Middlewares;

use Closure;
use Nano7\Http\Request;

class HasTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verificar se tem tenant
        if (!tenant()->check()) {
            abort(404, 'Tenant not found');
        }

        return $next($request);
    }
}
