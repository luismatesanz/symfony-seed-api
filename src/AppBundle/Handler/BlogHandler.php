<?php

namespace AppBundle\Handler;

use AppBundle\Repository\BlogRepository;
use Doctrine\DBAL\Query\QueryBuilder;


class BlogHandler
{
    private $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    use HandlerTrait;

    public function findAllQuery() : QueryBuilder
    {
        return $this->repository->findAllQuery();
    }

    public function find(int $id)
    {
        $blog = $this->repository->findById($id);
        return $blog;
    }
}