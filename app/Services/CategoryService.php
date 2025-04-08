<?php

namespace App\Services;

use App\Repository\CategoryRepository;
use Illuminate\Foundation\Http\FormRequest;


class CategoryService extends BaseService
{
    public function __construct(CategoryRepository $repository){
        
        parent::__construct($repository);
    }

    public function all(): mixed
    {
        return $this->repository->all();
    }

    public function create(FormRequest $request): bool
    {
        $data = $request->validated();
        $category = $this->repository->create($data);

        if ($category) return true;
        return false;
    }

}