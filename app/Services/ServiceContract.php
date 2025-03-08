<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ServiceContract
{
    /**
     * Retrieve all records, optionally with related models.
     *
     * @param array|null $relations Optional array of related models to eager load.
     * @return mixed A collection of all records.
     */
    public function all(array $relations = null): mixed;

    /**
     * Find a specific record by its unique ID.
     *
     * @param int $id The unique identifier of the record.
     * @return mixed The found record or null if not found.
     */
    public function find(int $id): mixed;

    /**
     * Create a new record with validation.
     *
     * @param Request $request The HTTP request containing input data.
     * @param array $rules Validation rules for the input data.
     * @return bool True if creation is successful, false otherwise.
     */
    public function create(Request $request, array $rules): bool;

    /**
     * Update an existing record by its ID.
     *
     * @param int $id The unique identifier of the record.
     * @param Request $request The HTTP request containing updated data.
     * @return mixed The updated record or false on failure.
     */
    public function update(int $id, Request $request);

    /**
     * Delete a record by its unique ID.
     *
     * @param int $id The unique identifier of the record.
     * @return bool True if deletion was successful, false otherwise.
     */
    public function delete(int $id): bool;
}
