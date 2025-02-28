<?php

namespace App\Services;

use App\Repository\TagReposository;

class TagService extends BaseService {

    public function __construct(TagReposository $repository){
        parent::__construct($repository);
    }
}