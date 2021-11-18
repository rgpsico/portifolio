<?php 

namespace App\Repositories;

use App\Models\article;
use App\Repositories\Contracts\ArticleRepositoryInterface;

class ArticleRepository  implements ArticleRepositoryInterface
{
    private $model;

    public function __construct(Article $model)
    {
        $this->model = $model;        
    }

    public function paginate($qtd)
    {
       return $this->model::paginate($qtd);
    }

    public function findById($id)
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
    
}