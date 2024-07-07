<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ViewItem extends Model
{
    use HasFactory;

    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }


    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'category_view_items')->withTimestamps();
    }
}
