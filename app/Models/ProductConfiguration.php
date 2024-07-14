<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ProductConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'btn_class',
        'data_object',
        'class',
        'extra_class',
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function images(): MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }
}
