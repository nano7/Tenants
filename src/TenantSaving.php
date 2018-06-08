<?php namespace Nano7\Tenants;

use Nano7\Database\Model\Model;

class TenantSaving
{
    /**
     * Handle the event.
     *
     * @param  Model $model
     * @return void
     */
    public function saving(Model $model)
    {
        // Set tenant_id
        if (! $model->hasAttribute('tenant_id')) {
            $model->tenant_id = tenant()->id();
        }
    }
}
