<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'code',
        'iso_code',
        'unblock_date'
    ];

    public function setSlugAttribute(string $value): void
    {
        $this->attributes['slug'] = strtolower($value);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class, 'location_country_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'location_country_id', 'id');
    }
}
