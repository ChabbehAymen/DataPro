<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private $service ;

    public function __construct(TagService $service){
        $this->service = $service;
    }

    public function index(){
       return $this->service->all();
    }

    public function store(Request $request ){
        if(
            $this->service->create($request,
            ["title"=>"required|string|max:255"
            ])) return redirect("tag.index") ; else return redirect('tag.creat');
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request);
        return redirect(route('tag.index'));
    }


    public function destroy($id){
        $this->service->delete($id);
        return redirect(route('products.index'));
    }
}
