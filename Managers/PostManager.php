<?php

namespace App\Managers;

use App\Core\Manager;
use App\Core\QueryBuilder;
use App\Models\Post;

class PostManager extends Manager {

    public function __construct()
    {
        parent::__construct(Post::class, 'posts');
    }

    public function getUserPost(int $id)
    {
        return (new QueryBuilder($this->getConnection()))
            ->select('p.*, u.*')
            ->from('nfoz_posts', 'p')
            ->join('nfoz_users', 'u')
            ->where('p.author = :iduser')
            ->setParameter('iduser', $id)
            ->getQuery()
            ->getArrayResult(Post::class);
    }
}