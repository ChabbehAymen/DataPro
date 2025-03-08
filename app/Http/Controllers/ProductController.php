<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {}

    public function index(Request $request)
    {
        $data = $this->service->all([
            'user',
            'productImage',
            'category',
            'tag'
            ])->pagination(5);
        if (str_contains($request->path(), 'admin')) {
            return view('products.index', compact('data'));
        }
        return response()->json($data,200);
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        if($this->service->create($request,
            ["title"=>"required|string|max:255",
                "desc"=>"required|string|max:255",
                "price"=>"required|integer"]))
            return redirect(route('products.index'));
        else return redirect(route('products.create'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request);
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect(route('products.index'));
    }
}
