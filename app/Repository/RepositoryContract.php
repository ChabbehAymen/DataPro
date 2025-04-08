<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryContract{
    /**
     * Retrieve all records that match the given condition.
     *
     * @param array|null $condition
     * @return Collection
     */
    public function all(array $condition = null): Collection;

    /**
     * Find a record by its ID.
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id): mixed;

    /**
     * Create a new record with the given data.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * Update a record with the given ID and data.
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data);

    /**
     * Delete a record by its ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id);
    public function count();

}
