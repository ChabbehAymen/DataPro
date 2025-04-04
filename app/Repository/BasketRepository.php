<?php

namespace App\Repository;

use App\Models\Basket;

class BasketRepository extends BaseRepository
{
    public function __construct(Basket $model){
        parent::__construct($model);
    }
    public function CompletedOrders():int
    {
        return $this->model->where('completed', true)->count();

    }
    public function ConfimedOrders():int
    {
        return $this->model->where('confirmed', true)->count();
    }
}

