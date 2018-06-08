<?php namespace Nano7\Tenants;

/**
 * Class TenantInterface
 * @property $id
 * @property $namespace
 */
interface TenantInterface
{
    /**
     * Load tenant by id.
     *
     * @param string $id
     * @return TenantInterface
     */
    public function getTenantById($id);

    /**
     * Load tenant by namespace.
     *
     * @param string $namespace
     * @return TenantInterface
     */
    public function getTenantByNamespace($namespace);
}