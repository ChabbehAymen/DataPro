<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $Service){

    }

    public function index(){
        return $this->service->all();
    }

    public function show($id){
        return $this->service->find($id);
    }


    public function store(Request $request){
        if($this->service->create($request,
            [
                "title" => "required|string|max:255",

            ]))
            return redirect(route('')); 
        else return redirect(route(''));

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
