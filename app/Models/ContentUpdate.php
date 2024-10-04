<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'version',
        'description',
        'update_installed_at',
        'status',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($contentUpdate) {
            $contentUpdateFilePath = $contentUpdate->path;
            if ($contentUpdateFilePath) {
                Storage::disk('public')->delete($contentUpdateFilePath);
            }
        });
    }
}
