<?php namespace Nano7\Tenants;

use Nano7\Foundation\Application;
use Nano7\Foundation\Support\Str;

class Tenant
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var TenantInterface
     */
    protected $current;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $namespace
     * @return bool
     */
    public function load($namespace)
    {
        $this->current = $this->getClass()->getTenantByNamespace($namespace);

        return $this->check();
    }

    /**
     * @param $id
     * @return bool
     */
    public function loadById($id)
    {
        $this->current = $this->getClass()->getTenantById($id);

        return $this->check();
    }

    /**
     * @return bool
     */
    public function loadByPathInfo()
    {
        $pathInfo = request()->getPathInfo();
        if (Str::is('/*', $pathInfo)) {
            $pathInfo = substr($pathInfo, 1);
        }
        $parts = explode('/', $pathInfo);

        if (count($parts) == 0) {
            return false;
        }

        return $this->load($parts[0]);
    }

    /**
     * @return TenantInterface
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * @return bool
     */
    public function check()
    {
        return ! is_null($this->current);
    }

    /**
     * Return id of tenant.
     * @return string|null
     */
    public function id()
    {
        if (! $this->check()) {
            return null;
        }

        return $this->current->id;
    }

    /**
     * Return namespace of tenant.
     * @return string|null
     */
    public function ns()
    {
        if (! $this->check()) {
            return null;
        }

        return $this->current->namespace;
    }

    /**
     * @return TenantInterface
     */
    protected function getClass()
    {
        $class = config('tenant.class', 'App\Tenant');
        if (! class_exists($class)) {
            throw new \Exception("Class [$class] to tenant nof found");
        }

        return $this->app->make($class);
    }
}