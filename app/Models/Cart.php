<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'view_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function view(): BelongsTo
    {
        return $this->belongsTo(view::class);
    }

    public function items(): HasMany {
        return $this->hasMany(CartItem::class);
    }

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function products(): HasManyThrough {
        return $this->hasManyThrough(Product::class, CartItem::class, 'cart_id', 'id', 'id', 'product_id');
    }
}
