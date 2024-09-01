<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
