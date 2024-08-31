<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;

class Scene extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'sequence_number',
        'is_visible',
        'slug',
    ];

    public function views(): HasMany {
        return $this->hasMany(View::class);
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($scene) {
            $scene->views()->delete();
        });
    }
}
