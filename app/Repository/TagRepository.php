<?php


namespace App\Repository;

use App\Models\Tag;

class TagRepository extends BaseRepository
{
   public function __construct(Tag $model)
   {
       parent::__construct($model);
   }
}
