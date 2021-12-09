<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\AbstractPaginator as Paginator;

interface BaseRepositoryInterface
{
    public function newQuery(); 
    public function doQuery($query = null, $take = 15, $paginate = true);
    public function getAll($take = 15, $paginate = true);
    public function lists($column, $key = null);
    public function findByID($id, $fail = true);

}