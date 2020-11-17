<?php

namespace App\Models;

use App\Models\Interfaces\IBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'country_id',
        'unblock_date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'unblock_date'      => IBaseModel::FORMAT_DATETIME,
        'created_at'        => IBaseModel::FORMAT_DATETIME,
        'updated_at'        => IBaseModel::FORMAT_DATETIME,
    ];

    public function setSlugAttribute(string $value): void
    {
        $this->attributes['slug'] = strtolower($value);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class, 'location_city_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'location_city_id', 'id');
    }
}
