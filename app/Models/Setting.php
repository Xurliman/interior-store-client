<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_phone',
        'company_email',
        'company_url',
        'currency',
        'currency_symbol',
        'timezone',
    ];

    public function images(): MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getMainLogo()
    {
        $image = $this->images()->where('type', 'transparent_bg')->first();
        if ($image) {
            return $image->path;
        }
    }

    public static function getCurrencySymbol():string
    {
        return Setting::first()->currency_symbol ?? "$";
    }

    public static function getCompanyName():string
    {
        return Setting::first()->company_name ?? "Company Name";
    }

    public static function getCompanyPhone():string
    {
        return Setting::first()->company_phone ?? "Company Phone";
    }

    public static function getCompanyEmail():string
    {
        return Setting::first()->company_email ?? "Company Email";
    }

    public static function getCompanyUrl():string
    {
        return Setting::first()->company_url ?? "Company Url";
    }
}
