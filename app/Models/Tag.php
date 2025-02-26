<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'title',
    ];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,  'product_tag');
    }
}
