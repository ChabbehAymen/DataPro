<?php

namespace App\Services;

use App\Repository\ProductRepository;
use App\Repository\RepositoryContract;

class ProductService extends BaseService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    public function paginate()
    {
    }
}
