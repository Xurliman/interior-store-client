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

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'scene_id',
        'name',
        'data_view',
        'is_default',
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
        return $this->belongsToMany(Category::class,'view_items')->withPivot('div_class')->withTimestamps();
    }
}
