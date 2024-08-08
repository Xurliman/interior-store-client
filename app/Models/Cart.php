<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;

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
        return $this->belongsTo(View::class);
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

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($cart) {
            $cart->items()->delete();

            $cartImg = $cart->image->path;
            Storage::disk('public')->delete($cartImg);

            $cart->image()->delete();
        });
    }
}
