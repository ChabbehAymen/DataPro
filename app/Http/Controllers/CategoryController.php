<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {}

    public function index(Request $request){
        $data = $this->service->all();
        if (str_contains($request->path(), 'admin')) {
            return view('category.index', compact('data'));
        }
        return response()->json($data, 200);
    }

    public function show($id){
        return $this->service->find($id);
    }

    public function create(Request $request)
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request){
        if($this->service->create($request))
            return redirect(route('categories.index')); 
        return redirect(route('categories.create'));

    }

    public function edit($id){
        $category = $this->service->find($id);
        return view('category.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, int $id){
        $this->service->update($id , $request);
        return redirect(route('categories.index'));

    }

    public function destroy($id){
        $this->service->delete($id);
        return redirect(route('categories.index')); 
    }

}
