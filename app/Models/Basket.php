<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Basket extends Model
{
    protected  $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'date',
        'confirmed',
        'completed'
    ];

    /**
     * Basket Relation to User
     *
     * @return BelongsTo
     */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }

    /**
     * Basket relation to Product
     *
     * @return HasOne
     */
   public function product(): hasOne
   {
       return $this->hasOne(Product::class);
   }
}
