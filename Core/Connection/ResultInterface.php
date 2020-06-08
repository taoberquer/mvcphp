<?php 

namespace App\Core\Connection;

interface ResultInterface 
{

    public function getArrayResult(string $className = null);
    public function getOneOrNullResult();
    public function getValueResult();
}