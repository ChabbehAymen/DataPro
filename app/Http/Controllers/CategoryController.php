<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service){

    }

    public function index(Request $request){
        $data = $this->service->all()->pagination(5);
        if (str_contains($request->path(), 'admin')) {
            return view('category.index', compact('data'));
        }
        return response()->json($data, 200);
    }

    public function show($id){
        return $this->service->find($id);
    }


    public function store(Request $request){
        if($this->service->create($request,
            [
                "title" => "required|string|max:255",

            ]))
            return redirect(route('category.index')); 
        else return redirect(route('category.index'));

    }

    public function update(Request $request, $id){
        $this->service->update($request, $id);
        return redirect(route(''));

    }

    public function destroy($id){
        $this->service->delete($id);
        return redirect(route('')); 
    }

}
