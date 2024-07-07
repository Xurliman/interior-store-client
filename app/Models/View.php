<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'scene_id',
        'name',
        'is_default',
    ];

    public function scene(): BelongsTo {
        return $this->belongsTo(Scene::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'category_view');
    }
}
