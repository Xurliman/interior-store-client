<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;
use function PHPUnit\Framework\isEmpty;

class Product extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'short_name',
        'description',
        'dimensions',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
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

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->productConfigurations()->delete();
//            $product->cartItems()->delete();

            $productImg = $product->image->path;
            if ($productImg) {
                Storage::disk('public')->delete($productImg);
                $product->image()->delete();
            }
        });
    }
}
