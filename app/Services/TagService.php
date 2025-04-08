<?php

namespace App\Services;

use App\Repository\TagRepository;

class TagService extends BaseService
{
    public function __construct(TagRepository $repository)
    {
        parent::__construct($repository);
    }
}
