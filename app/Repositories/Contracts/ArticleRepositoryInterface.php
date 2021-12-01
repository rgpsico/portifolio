<?php 

namespace App\Repositories\Contracts;

interface ArticleRepositoryInterface 
{
   public function paginate(int $qtd);
   public function findById(int $id);
   public function listAll();
   public function create(array $data);
   public function update(array $data);
   public function delete(int $id);
}