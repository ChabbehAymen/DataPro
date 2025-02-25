<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
