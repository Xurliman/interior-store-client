<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'layer_order',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function viewItems(): HasMany {
        return $this->hasMany(ViewItem::class);
    }

    public function views(): BelongsToMany {
        return $this->belongsToMany(View::class,'view_items')->withTimestamps();
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->products()->delete();
        });
    }
}
