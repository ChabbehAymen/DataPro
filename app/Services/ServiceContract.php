<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;

interface ServiceContract
{
    /**
     * Retrieve all records, optionally with related models.
     *
     * @param array|null $relations Optional array of related models to eager load.
     * @return mixed A collection of all records.
     */
    public function all(): mixed;

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
     * @param FormRequest $request The HTTP request containing input data.
     * @return bool True if creation is successful, false otherwise.
     */
    public function create(FormRequest $request): bool;

    /**
     * Update an existing record by its ID.
     *
     * @param int $id The unique identifier of the record.
     * @param FormRequest $request The HTTP request containing updated data.
     * @return mixed The updated record or false on failure.
     */
    public function update(int $id, FormRequest $request);

    /**
     * Delete a record by its unique ID.
     *
     * @param int $id The unique identifier of the record.
     * @return bool True if deletion was successful, false otherwise.
     */
    public function delete(int $id): bool;
}
