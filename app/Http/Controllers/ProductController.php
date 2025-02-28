<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {}

    public function index()
    {
        return $this->service->all();
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function store(Request $request)
    {
        if($this->service->create($request,
            ["title"=>"required|string|max:255",
                "desc"=>"required|string|max:255",
                "price"=>"required|integer"]))
            return redirect(route('product.index'));
        else return redirect(route('product.create'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request);
        return redirect(route('product.index'));
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect(route('product.index'));
    }
}
