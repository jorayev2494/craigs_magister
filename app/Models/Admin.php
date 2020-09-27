<?php

namespace App\Models;

use App\Models\Abstracts\JWTAuthModel;
use App\Models\Interfaces\IBaseUserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'last_login'        => 'datetime:Y-m-d H:i:s',
        'last_activity'     => 'datetime:Y-m-d H:i:s',
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s',
        'last_login'        => 'datetime:Y-m-d H:i:s',
    ];

     /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

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
    
}
