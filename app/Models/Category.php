<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'data_mask',
        'div_id',
        'class',
        'div_class',
        'img_class',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function viewItem(): HasOne {
        return $this->hasOne(ViewItem::class);
    }

    public function views(): BelongsToMany {
        return $this->belongsToMany(View::class,'view_items')->withPivot('div_class')->withTimestamps();
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->products()->delete();
        });
    }
}
