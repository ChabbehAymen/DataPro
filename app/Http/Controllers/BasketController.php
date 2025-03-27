<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(protected BasketService $BasketService)
    {
    }

    // List all baskets with pagination
    public function index(Request $request)
    {
        $baskets = $this->BasketService->getAllBasketsPaginated();
        $baskets->load('user', 'product'); 

        if (str_contains($request->path(), 'admin')) {
            return view('basket.index', compact('baskets'));
        }

        return response()->json($baskets, 200);
    }

    public function showConfirmedBaskets()
    {
        $confirmedBaskets = $this->BasketService->getConfirmedBaskets();
        return view('basket.confirmed', compact('confirmedBaskets'));
    }


    // Confirm the basket
    public function confirmBasket($id)
    {
        $this->BasketService->confirmOrder($id);
        return redirect()->route('baskets.index')->with('success', 'Basket confirmed!');
    }

    // Complete the basket
    public function completeBasket($id)
    {
        $this->BasketService->completeOrder($id);
        return redirect()->route('baskets.index')->with('success', 'Basket completed!');
    }
}
