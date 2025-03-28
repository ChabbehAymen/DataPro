<?php

namespace App\Services;

use App\Repository\BasketRepository;
use \Illuminate\Foundation\Http\FormRequest;

class BasketService extends BaseService
{
    public function __construct(BasketRepository $repository){

        parent::__construct($repository);
    }

    public function create( FormRequest $request): bool
    {
        $data = $request->validated();
        $data["user_id"] = auth()->user()->id;
        if($this->repository->create($data)) return true;
        return false;
    }
}
