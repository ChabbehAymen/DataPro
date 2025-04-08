<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\BasketService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\TagService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $tagService;
    protected $basketService;

    public function __construct(ProductService $productService, CategoryService $categoryService, TagService $tagService, BasketService $basketService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->basketService = $basketService;
    }

    public function index()
    {
        $totalProducts = $this->productService->count();
        $totalCategories = $this->categoryService->count();
        $totalTags = $this->tagService->count();
        $totalBaskets = $this->basketService->count();
        $totalConfirmedOrders = $this->basketService->ConfimedOrders();
        $totalCompletedOrders = $this->basketService->CompletedOrders();

        return view('dashboard', compact('totalProducts', 'totalCategories', 'totalTags', 'totalBaskets', 'totalConfirmedOrders', 'totalCompletedOrders'));
    }

}
