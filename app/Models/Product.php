<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use function PHPUnit\Framework\isEmpty;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'short_name',
        'description',
        'dimensions',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function price(): HasOne
    {
        return $this->hasOne(Price::class);
    }

    public function productConfigurations(): HasMany {
        return $this->hasMany(ProductConfiguration::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public static function isInCart($productId, $cartId): bool
    {
        return (bool)(Product::find($productId)->cartItems()->where('cart_id', $cartId)->first());
    }
}
