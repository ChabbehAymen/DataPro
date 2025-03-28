<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Services\BasketService;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BasketController extends Controller
{
    public function __construct(protected BasketService $service){

    }

    public function index(){
        return $this->service->all();
    }

    public function show($id){
        return $this->service->find($id);
    }


    public function store(BasketRequest $request){
        if($this->service->create($request))
            return response()->json(["message"=>"Item Added To Basket"], 200);
        else response()->json(["Error Someting Went Wrong"], 200);

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
