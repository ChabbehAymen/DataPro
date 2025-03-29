<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(protected BasketService $basketService) {}

    public function index(Request $request)
    {
        $baskets = $this->basketService->getAllBasketsPaginated();
        $baskets->load('user', 'product'); 

        if (str_contains($request->path(), 'admin')) {
            return view('basket.index', compact('baskets'));
        }

        return response()->json($baskets, 200);
    }

    public function showConfirmedBaskets()
    {
        $confirmedBaskets = $this->basketService->getConfirmedBaskets();
        return view('basket.confirmed', compact('confirmedBaskets'));
    }

    public function confirmBasket($id)
    {
        $this->basketService->confirmOrder($id);
        return redirect()->route('baskets.index')->with('success', 'Basket confirmed!');
    }

    public function completeBasket($id)
    {
        $this->basketService->completeOrder($id);
        return redirect()->route('baskets.index')->with('success', 'Basket completed!');
    }
}
