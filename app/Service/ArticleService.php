<?php 

namespace App\Service;
use App\Repositories\Contracts\ArticleRepositoryInterface;

class ArticleService
{
    private $repository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->repository = $articleRepository;
        
    }

    public function paginate($qtd)
    {
        return $this->repository->findById($qtd);     
    }

    public function findById($id)
    {
        $result = $this->repository->findById($id);
         if ($result) {
            return $result;    
         }

         return response()->json(['message' => 'Article Not Found'], 404);
    }

    public function create($data)
    {
        $result = $this->repository->create($data);
         if ($result) {
            return $result;    
         }
    }

    public function delete($id)
    {
        $result = $this->repository->findById($id);
         if ($result) {
             $result->delete($id);
            return response()->json(['message' => 'Artigo excluido com sucesso'], 200);   
         }

         return response()->json(['message' => 'Article Not Found'], 404);
    }

    public function listAll()
    {
     
    }
    
}