<?php

namespace App\Core;

use App\Core\Connection\BDDInterface;
use App\Core\Connection\ResultInterface;

class QueryBuilder
{
    protected $connection;

    protected $query;

    protected $parameters;

    protected $alias;

    public function __construct(BDDInterface $connection = null)
    {
        $this->connection = $connection;
    }

    public function select(string $values = "*"): QueryBuilder
    {
        $this->query = 'select ' . $values . ' ';
        return $this;
    }

    public function from(string $table, string $alias): QueryBuilder
    {
        $this->query .= 'from ' . $table . ' as ' . $alias . ' ';
        return $this;
    }

    public function where(string $conditions): QueryBuilder
    {
        $this->query .= 'where ' . $conditions . ' ';

        return $this;
    }

    public function setParameter(string $key, string $value): QueryBuilder
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    public function join(string $table, string $aliasTarget, string $fieldSource = "id", string $fieldTarget = "id"): QueryBuilder
    {
        $this->query .= 'inner join ' . $table . ' ' . $aliasTarget . ' on ' . $this->alias . '.' . $fieldSource . ' = ' . $aliasTarget . '.' . $fieldTarget . ' ';
        return $this;
    }

    public function leftJoin(string $table, string $aliasTarget, string $fieldSource = "id", string $fieldTarget = "id"): QueryBuilder
    {
        $this->query .= 'left join ' . $table . ' ' . $aliasTarget . ' on ' . $this->alias . '.' . $fieldSource . ' = ' . $aliasTarget . '.' . $fieldTarget . ' ';
        return $this;
    }

    public function addToQuery(string $query): QueryBuilder
    {
        $this->query .= ' ' . $query;
        return $this;
    }

    public function getQuery(): ResultInterface
    {
        return $this->connection->query($this->query, $this->parameters);
    }
}