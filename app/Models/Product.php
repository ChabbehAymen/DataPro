<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'price',
    ];

    /**
     * products relation to User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * products relation to ProductImage
     *
     * @return HasMany
     */
    public function productImage(): HasMany
    {
        return  $this->hasMany(ProductImage::class);
    }

    /**
     * Product relation to category
     *
     * @return BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,  'product_category',  'product_id', 'category_id');
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
    public function tag(): HasMany
    {
        return $this->hasMany(Tag::class,  'product_tags');
    }
}
