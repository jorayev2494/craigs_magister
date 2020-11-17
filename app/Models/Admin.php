<?php

namespace App\Models;

use App\Models\Abstracts\JWTAuthModel;
use App\Models\Interfaces\IBaseModel;
use App\Models\Interfaces\IBaseUserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends JWTAuthModel implements IBaseUserModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'active',
        'role_id',
        'remember_token',
        'last_login',
        'last_activity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_confirmed'   => 'boolean',
        'active'            => 'boolean',
        'last_login'        => IBaseModel::FORMAT_DATETIME,
        'last_activity'     => IBaseModel::FORMAT_DATETIME,
        'created_at'        => IBaseModel::FORMAT_DATETIME,
        'updated_at'        => IBaseModel::FORMAT_DATETIME,
        'last_login'        => IBaseModel::FORMAT_DATETIME,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_login', 
        'last_activity', 
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getAvatarPath(): string
    {
        return '/images/portrait/small/';
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'location_country_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'location_city_id', 'id');
    }
    
    public function role(): BelongsTo
    {
        return $this->belongsTo(AdminRole::class, 'role_id', 'id');
    }
}
