<?php

namespace App\Services;

use App\Repository\ProductRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class ProductService extends BaseService
{
    /**
     * Relations to be loaded with the product.
     *
     * @var array
     */
    private $relation = [
        'user',
        'productImage',
        'category',
        'tag'
    ];

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $repository->setRelations($this->relation);
        parent::__construct($repository);
    }

    /**
     * Retrieve all products.
     *
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->repository->all();
    }

    /**
     * Retrieve products by tag ID.
     *
     * @param int $id
     * @return Collection
     */
    public function getProductsByTag(int $id): Collection
    {
        return $this->repository->all(['tag','tag_id', $id]);
    }

    /**
     * Create a new product.
     *
     * @param FormRequest $request
     * @return bool
     */
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
    /**
     * Update an existing product by its ID.
     *
     * @param FormRequest $request
     * @return bool
     */
    public function update(int $id, FormRequest $request)
    {
        $data = $request->validated();
        $product = $this->repository->find($id);
        $product->update($data);
        if($product)
        {
            $product->category()->sync($request->input('category'));
            if(!empty($request->input('tags')))
            {
                $product->tag()->sync($request->input('tags'));
            }
            return true;
        }
        return false;
    }

}
