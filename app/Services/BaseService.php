<?php

namespace App\Services;

use App\Repository\RepositoryContract;
use Illuminate\Http\Request;

class BaseService implements ServiceContract
{
    /**
     * The repository instance.
     *
     * @var RepositoryContract
     */
    protected $repository;

    /**
     * BaseService constructor.
     *
     * @param RepositoryContract $repository The repository instance to handle data operations.
     */
    public function __construct(RepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Retrieve all records, optionally with related models.
     *
     * @param array|null $relations Optional array of related models to eager load.
     * @return mixed A collection of all records.
     */
    public function all($relations = null): mixed
    {
        return $this->repository->all($relations);
    }

    /**
     * Find a specific record by its unique ID.
     *
     * @param int $id The unique identifier of the record.
     * @return mixed The found record or null if not found.
     */
    public function find(int $id): mixed
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new record with validation.
     *
     * @param Request $request The HTTP request containing input data.
     * @param array $rules Validation rules for the input data.
     * @return bool True if creation is successful, false otherwise.
     */
    public function create(Request $request, array $rules): bool
    {
        $request->validate($rules);
        return $this->repository->create($request->all());
    }

    /**
     * Update an existing record by its ID.
     *
     * @param int $id The unique identifier of the record.
     * @param Request $request The HTTP request containing updated data.
     * @return void
     */
    public function update(int $id, Request $request)
    {
        $this->repository->update($id, $request->all());
    }

    /**
     * Delete a record by its unique ID.
     *
     * @param int $id The unique identifier of the record.
     * @return bool True if deletion was successful, false otherwise.
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

}
