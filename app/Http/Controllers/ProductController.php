<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\TagService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * ProductController constructor.
     * @param ProductService $productService Service for handling product-related operations
     * @param CategoryService $categoryService Service for handling category-related operations
     * @param TagService $tagService Service for handling tag-related operations
     */
    public function __construct(protected ProductService $productService, protected CategoryService $categoryService, protected TagService $tagService)
    {
    }

    /**
     * Display a listing of products.
     * Returns a view for admin routes or JSON response for API routes.
     * @param Request $request The incoming HTTP request
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = $this->productService->all();
        if (str_contains($request->path(), 'admin')) {
            $data = $data->pagination(5);
            return view('products.index', compact('data'));
        }
        return response()->json($data, 200);
    }

    /**
     * Get products associated with a specific tag.
     * @param int $id The tag ID
     * @return mixed Collection of products with the specified tag
     */
    public function getProductsByTag(int $id)
    {
        return $this->productService->getProductsByTag($id);
    }

    /**
     * Get products by searching their titles.
     * @param string $title The search query for product titles
     * @return mixed Collection of products matching the title search
     */
    public function getProductsByTitle(string $title)
    {
        return response()->json($this->productService->getProductsByTitle($title), 200);
    }

    /**
     * Display the specified product.
     * Returns a view for admin routes or JSON response for API routes.
     * @param Request $request The incoming HTTP request
     * @param mixed $id The product ID
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request,$id)
    {
        $product = $this->productService->find($id);
        if (str_contains($request->path(), 'admin')) {
            return view('products.show', compact('product'));
        }
        return response()->json($product, 200);

    }

    /**
     * Show the form for creating a new product.
     * @param Request $request The incoming HTTP request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $categories = $this->categoryService->all();
        $tags = $this->tagService->all();
        return view('products.create', compact('tags', 'categories'));
    }

    /**
     * Show the form for editing the specified product.
     * @param string $id The product ID
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $product = $this->productService->find($id);
        $categories = $this->categoryService->all();
        $tags = $this->tagService->all();
        return view('products.edit', compact('tags', 'categories','product'));
    }

    /**
     * Store a newly created product in storage.
     * @param StoreProductRequest $request The validated product creation request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        if ($this->productService->create($request))
            return redirect(route('products.index'));
        return redirect(route('products.create'));
    }

    /**
     * Update the specified product in storage.
     * @param StoreProductRequest $request The validated product update request
     * @param mixed $id The product ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreProductRequest $request, $id)
    {
        $this->productService->update($id, $request);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified product from storage.
     * @param mixed $id The product ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect(route('products.index'));
    }
}
