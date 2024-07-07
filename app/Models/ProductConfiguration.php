<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ProductConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'data_mask',
        'data_object',
        'data_remove',
        'class',
        'extra_class',
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }
}
