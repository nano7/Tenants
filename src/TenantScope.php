<?php namespace Nano7\Tenants;

use Nano7\Database\Model\Model;
use Nano7\Database\Model\Scope;
use Nano7\Database\Query\Builder as QueryBuilder;

class TenantScope extends Scope
{
    /**
     * Id of scope.
     * @var string
     */
    protected $name = 'tenant';

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  QueryBuilder  $builder
     * @param  Model  $model
     * @return void
     */
    public function apply(QueryBuilder $builder, Model $model)
    {
        $builder->where('tenant_id', tenant()->id());
    }
}