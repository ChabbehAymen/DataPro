<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository extends BaseRepository {

    public function __construct(Category $model) {
        
        parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model->select('id', 'title', 'created_at')->get();
    }

    public function paginate($perPage)
    {
        return $this->model->paginate($perPage);
    }


}