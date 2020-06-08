<?php 

namespace App\Core\Connection;

use Throwable;

class PDOResult implements ResultInterface
{

    protected $statement;
  
    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function getArrayResult(string $className = null): array
    {
        $result = $this->statement->fetchAll();
        if ($className != null)
        {
            $newResult = [];
            foreach ($result as $item)
            {
                $newResult[] = (new $className)->hydrate($item);
            }
            $result = $newResult;
        }

        return $result;
    }

    public function getOneOrNullResult(): ?array
    {
        return $this->statement->fetch(); 
    }

    public function getValueResult()
    {
        return $this->statement->fetchColumn();
    }
}