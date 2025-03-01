<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BasketController extends Controller
{
    public function __construct(protected BasketService $Service){

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
                'quantity'=>'required|integer|min:1',
                'date'=>'required|date',
                'confirmed'=>'required|boolean',
                'completed'=>'required|boolean',

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
