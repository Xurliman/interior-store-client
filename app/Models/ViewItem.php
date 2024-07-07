<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ViewItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'view_id',
        'category_id',
        'div_class',
    ];

    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }


    public function categories(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
