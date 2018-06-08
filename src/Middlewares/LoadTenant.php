<?php namespace Nano7\Tenants\Middlewares;

use Closure;
use Nano7\Http\Request;

class LoadTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  \Closure $next
     * @param  boolean $abort
     * @return mixed
     */
    public function handle($request, Closure $next, $abort = false)
    {
        $abort = (($abort == 'true') || ($abort === true));
        $tenant_ns = $request->route()->parameter('tenant');

        // Verificar se inquilino foi informado
        if (is_null($tenant_ns) && $abort) {
            abort(404, 'Tenant not found', 404);
        }

        if (!is_null($tenant_ns)) {
            if ((!tenant()->load($tenant_ns)) && $abort) {
                abort(404, 'Tenant not found');
            }
        }

        return $next($request);
    }
}
