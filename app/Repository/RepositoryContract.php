<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryContract{
    public function all(array $condition = null): Collection;
    public function find(int $id): mixed;
    public function create(array $data): mixed;
    public function update(int $id, array $data);
    public function delete(int $id);
}