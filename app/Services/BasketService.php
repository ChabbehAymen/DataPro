<?php

namespace App\Services;

use App\Repository\BasketRepository;
use App\Models\Basket;

class BasketService extends BaseService
{
    public function __construct(BasketRepository $repository)
    {
        parent::__construct($repository);
    }

    public function confirmOrder($id)
    {
        if ($basket = $this->repository->find($id)) {
            $basket->confirmed = true;
            $basket->save();
        }
    }

    public function getConfirmedBaskets()
    {
        return Basket::where('confirmed', true)->with(['user', 'product'])->get();
    }

    public function completeOrder($id)
    {
        if ($basket = $this->repository->find($id)) {
            $basket->completed = true;
            $basket->save();
        }
    }

    public function getAllBasketsPaginated($perPage = 5)
    {
        return Basket::paginate($perPage);
    }
}
