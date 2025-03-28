<?php

namespace App\Repository;

use App\Models\Basket;

class BasketRepository extends BaseRepository
{

    public function __construct(Basket $model){
        parent::__construct($model);
    }
}

