<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected $id;

    protected $title;

    protected $author;

    public function initRelation(): array
    {
        return [
            'author' => User::class,
        ];
    }
}