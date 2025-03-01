<?php

namespace App\Services;

use App\Repository\BasketRepository;
use Illuminate\Http\Request;

class BasketService extends BaseService
{
    public function __construct(BasketRepository $repository){

        parent::__construct($repository);
    }
}
