<?php
namespace App\Repository;

interface RepositoryContract{
    public function all($relations = null);
    public function find(int $id): mixed;
    public function create(array $data): mixed;
    public function update(int $id, array $data);
    public function delete(int $id);
}
