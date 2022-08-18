<?php

namespace App\Repositories;

use App\Models\categoria;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $model;

    public function __construct(categoria $model)
    {
        $this->model = $model;
    }

    public function paginate($qtd)
    {
        return $this->model::paginate($qtd);
    }

    public function get()
    {
        return $this->model::get();
    }

    public function findByID($id, $fail = true)
    {
        return $this->model::find($id);
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function listAll()
    {
        return $this->model::all();
    }

    public function delete($id)
    {
        return $this->model::delete($id);
    }

    public function update($data)
    {
        return $this->model::update($data);
    }
}
