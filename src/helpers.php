<?php

if (! function_exists('tenant')) {
    /**
     * Load tenant structure.
     *
     * @return \Nano7\Tenants\Tenant
     */
    function tenant()
    {
        return app('tenants');
    }
}