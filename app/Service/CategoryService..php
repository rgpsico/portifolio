<?php

namespace App\Service;

class CategoryService
{
    private $repository;

    public function __construct(CategoryService $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function listAll()
    {
        return $this->repository->listAll();
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
