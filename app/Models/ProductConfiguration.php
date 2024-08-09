<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;

class ProductConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'view_id',
        'data_object',
        'is_visible',
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function images(): MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function view(): BelongsTo {
        return $this->belongsTo(View::class);
    }


    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($productConfiguration) {
            $productConfigurationImages = $productConfiguration->images;
            foreach ($productConfigurationImages as $productConfigurationImg) {
                Storage::disk('public')->delete($productConfigurationImg);
            }

            $productConfiguration->images()->delete();
        });
    }
}
