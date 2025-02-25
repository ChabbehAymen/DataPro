<?php

namespace App\Services;

use App\Repository\RepositoryContract;
use Illuminate\Http\Request;

abstract class BaseService implements ServiceContract
{
    protected $repository;
    public function __construct(RepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return  $this->repository->all();
    }

    public function find(int $id)
    {
        $repository = $this->repository->find($id);
    }

    public function create(Request $request, array $rules): bool
    {
        $request->validate($rules);
        return $this->repository->create($request->all());
    }

    public function update(int $id, Request $request)
    {
        $this->repository->update($id,  $request->all());
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

}
