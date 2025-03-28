<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\TagService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService, protected CategoryService $categoryService, protected TagService $tagService)
    {
    }

    public function index(Request $request)
    {
        $data = $this->productService->all();
        if (str_contains($request->path(), 'admin')) {
            $data = $data->pagination(5);
            return view('products.index', compact('data'));
        }
        return response()->json($data, 200);
    }

    public function getProductsByTag(int $id)
    {
        return $this->productService->getProductsByTag($id);
    }
    public function show(Request $request,$id)
    {
        $product = $this->productService->find($id);
        if (str_contains($request->path(), 'admin')) {
            return view('products.show', compact('product'));
        }
        return response()->json($product, 200);

    }

    public function create(Request $request)
    {
        $categories = $this->categoryService->all();
        $tags = $this->tagService->all();
        return view('products.create', compact('tags', 'categories'));
    }
    public function edit(string $id)
    {
        $product = $this->productService->find($id);
        $categories = $this->categoryService->all();
        $tags = $this->tagService->all();
        return view('products.edit', compact('tags', 'categories','product'));
    }

    public function store(StoreProductRequest $request)
    {
        if ($this->productService->create($request))
            return redirect(route('products.index'));
        return redirect(route('products.create'));
    }


    public function update(StoreProductRequest $request, $id) // TODO Update Request
    {
        $this->productService->update($id, $request);
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect(route('products.index'));
    }
}
