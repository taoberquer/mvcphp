<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected $id;

    protected $title;

    protected $author;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function initRelation(): array
    {
        return [
            'author' => User::class,
        ];
    }
}