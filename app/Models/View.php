<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;

class View extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'scene_id',
        'name',
        'description',
        'is_default',
        'is_visible',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function scene(): BelongsTo {
        return $this->belongsTo(Scene::class);
    }

    public function images(): MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function items(): HasMany {
        return $this->hasMany(ViewItem::class);
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class,'view_items')->withTimestamps();
    }

    public function productConfigurations(): HasMany
    {
        return $this->hasMany(ProductConfiguration::class);
    }

    public function products(): HasManyThrough {
        return $this->hasManyThrough(Product::class, ProductConfiguration::class, 'view_id', 'id', 'id', 'product_id');
    }

    public static function getView($viewId)
    {
        return self::with('products.category')
            ->with('products.image')
            ->with('products.productConfigurations.images')
            ->firstWhere('id', $viewId);
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($view) {
            $viewImages = $view->images;
            foreach ($viewImages as $viewImg) {
                if ($viewImg->path) {
                    Storage::disk('public')->delete($viewImg->path);
                    $view->images()->delete();
                }
            }
            $view->items()->delete();
        });
    }
}
