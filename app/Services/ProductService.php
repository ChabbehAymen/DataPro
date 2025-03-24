<?php

namespace App\Services;

use App\Repository\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class ProductService extends BaseService
{
    private $relation = [
        'user',
        'productImage',
        'category',
        'tag'
    ];
    public function __construct(ProductRepository $repository)
    {
        $repository->setRelations($this->relation);
        parent::__construct($repository);
    }

    public function all(): mixed
    {
        return $this->repository->all();
    }

    public function getProductsByTag(int $id): Collection
    {
        return $this->repository->all(['tag','tag_id', $id]);
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
