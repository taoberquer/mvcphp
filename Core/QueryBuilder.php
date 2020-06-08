<?php

namespace App\Core;

use App\Core\Connection\BDDInterface;
use App\Core\Connection\ResultInterface;

class QueryBuilder
{
    public function __construct(BDDInterface $connection = null)
    {

    }

    public function select(string $value = '*'): QueryBuilder
    {

    }

    public function from(string $table, string $alias): QueryBuilder
    {

    }

    public function where(string $conditions): QueryBuilder
    {

    }

    public function setParameter(string $key, string $value): QueryBuilder
    {

    }

    public function join(string $table, string $aliasTarget, string $fieldSource = 'id', string $fieldTarget = 'id'): QueryBuilder
    {

    }

    public function leftJoin(string $table, string $aliasTarget, string $fieldSource = 'id', string $fieldTarget = 'id'): QueryBuilder
    {

    }

    public function addToQuery(string $query): QueryBuilder
    {

    }

    public function getQuery(): ResultInterface
    {

    }
}