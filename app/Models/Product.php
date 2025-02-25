<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'price',
    ];

    /**
     * product relation to ProductImg
     *
     * @return BelongsToMany
     */
    public function productImg(): BelongsToMany
    {
        return  $this->belongsToMany(ProductImg::class);
    }

    /**
     * Product relation to category
     *
     * @return BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,  'product_category');
    }

    /**
     * Product relation to Basket
     *
     * @return BelongsTo
     */
    public function basket(): BelongsTo
    {
        return $this->belongsTo(Basket::class);
    }

    /**
     * Prodcut relation to Tag
     *
     * @return BelongsToMany
     */
    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,  'product_tag');
    }
}
