<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable;

class ViewItem extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'view_id',
        'category_id',
        'width',
        'height',
        'top',
        'bottom',
        'right',
        'left',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }


    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
