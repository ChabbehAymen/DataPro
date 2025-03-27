<?php

namespace App\Repository;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BasketRepository extends BaseRepository
{

    public function __construct(Basket $model){
        parent::__construct($model);
    }
    public function CompletedOrders(){
        $this->model->where('completed', '1')->get();
    }
    public function ConfimedOrders(){
        $this->model->where('confirmed', true)->count();
    }
}

