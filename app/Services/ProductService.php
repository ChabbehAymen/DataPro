<?php

namespace App\Services;

use App\Repository\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;

class ProductService extends BaseService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    public function all(): mixed
    {
        return $this->repository->all([
            'user',
            'productImage',
            'category',
            'tag'
        ]);
    }

    public function create(FormRequest $request): bool
    {
        $data = $request->validated();
        $product = $this->repository->create($data);
        if($product) 
        {
            $product->category()->attach($request->input('category'));
            if(!empty($request->input('tags'))) 
            {
                $product->tag()->attach($request->input('tags'));
            }
            return true;
        }
        return false;
    }
}
