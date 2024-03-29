<?php

namespace App\Service;

use App\Repositories\ArticleRepository;

class ArticleService
{
    private $repository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->repository = $articleRepository;
    }

    public function listAll()
    {
        return $this->repository->listAll();
    }

    public function getAll($qtd, $paginate = false)
    {
        return $this->repository->paginate($qtd, $paginate);
    }

    public function get()
    {
        return $this->repository->get();
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

    public function update($data)
    {
        $result = $this->repository->update($data);

        return response()->json(['message' => 'Article Not Found'], 404);
    }

    public function search($request)
    {
        $this->repository->search($request);
    }
}
