<?php

// BasketService.php

namespace App\Services;

use App\Repository\BasketRepository;
use App\Models\Basket;

class BasketService extends BaseService
{
    public function __construct(BasketRepository $repository)
    {
        parent::__construct($repository);
    }
    
    // Confirm the basket
    public function confirmOrder($id)
    {
        $basket = $this->repository->find($id);
        
        if ($basket) {
            $basket->confirmed = true;
            $basket->save();
        }
    }

    public function getConfirmedBaskets()
    {
        return Basket::where('confirmed', true)->with(['user', 'product'])->get();
    }


    // Complete the basket
    public function completeOrder($id)
    {
        $basket = $this->repository->find($id);

        if ($basket) {
            $basket->completed = true;
            $basket->save();
        }
    }

    public function getAllBasketsPaginated($perPage = 5)
    {
        return Basket::paginate($perPage); 
    }
}

