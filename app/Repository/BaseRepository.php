<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository implements RepositoryContract
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the models from the database.
     *
     * @return Collection
     */
    public function all($relations = null): Collection
    {
        if($relations) return  $this->model->with($relations)->get();
        return $this->model->all();
    }

    /**
     * Get a specific model from database
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    /**
     * create a new model into database.
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        $this->model->fill($data);
        return $this->model->save();
    }

    /**
     * update a model data in database.
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $model = $this->find($id);
        $model->update($data);
    }

    /**
     * deletes a model from database
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
