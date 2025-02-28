<?php

namespace App\Services;

use App\Repository\BasketRepository;
use Illuminate\Http\Request;

class BasketService
{
    protected $basketRepository;

    public function __construct(BasketRepository $basketRepository){
        $this->basketRepository = $basketRepository;
    }
    //get all baskat
    public function getAllBasket()
    {
        return $this->basketRepository->getAll();
    }
    //get basket by id
    public function grtBasketById(int $id)
    {
        return $this->basketRepository->getById($id);
    }
    //create basket
    public function createBasket(array $data)
    {
        return $this->basketRepository->create($data);
    }
    //update basket
    public function updateBasket(int $id,array $data)
    {
        return $this->basketRepository->update($id,$data);
    }
    //delete basket
    public function deleteBasket(int $id)
    {
        return $this->basketRepository->delete($id);
    }
}
