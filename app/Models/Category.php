<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = [
        'title',
    ];

    /**
     * Category Relation to Product
     *
     * @return BelongsToMany
     */
    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,   'product_category');
    }
}
