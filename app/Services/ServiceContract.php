<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ServiceContract
{
    public function all();
    public function find(int $id);
    public function create(Request $request, array $rules): bool;
    public function update(int $id, Request $request);
    public function delete(int $id);
}
