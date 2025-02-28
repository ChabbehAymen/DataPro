<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BasketController extends Controller
{
    protected $basketService;

    public function __construct(BasketService $basketService)
    {
        return $this->basketService = $basketService;
    }
    //get basket
    public function index()
    {
        return response()->json($this->basketService->getAllBasket());
    }
    //show basket detaille
    public function show($id)
    {
        return response()->json($this->basketService->grtBasketById($id));
    }
    //create basket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'=>'required|exist:users,id',
            'product_id'=>'required|exist:products,id',
            'quantity'=>'required|integer|min:1',
            'date'=>'required|date',
            'confirmed'=>'required|boolean',
            'completed'=>'required|boolean',
        ]);
        return response()->json($this->basketService->createBasket($validated));
    }
    //update basket
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'quantity'=>'required|integer|min:1',
            'date'=>'required|date',
            'confirmed'=>'required|boolean',
            'completed'=>'required|boolean',
        ]);
        return response()->json(['updated' => $this->basketService->updateBasket($id,$validated)]);
    }
    //delete basket
    public function destroy($id)
    {
        return response()->json(['deleted' => $this->basketService->deleteBasket($id)]);
    }
}
