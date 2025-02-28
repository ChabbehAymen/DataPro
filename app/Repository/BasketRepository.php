<?php

namespace App\Repository;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BasketRepository{
    //get All Basket
 public function getAll()
 {
    return Basket::all();
 }
 //get basket by id
 public function getById(int $id)
 {
    return Basket::find($id);
 }
 //create basket
 public function create(array $data)
 {
    return Basket::create($data);
 }
 //update basket
 public function update(int $id,array $data)
 {
    return Basket::where('id',$id)->update($data);
 }
 //delete basket
 public function delete(int $id)
 {
    return Basket::destroy($id);
 }
}

