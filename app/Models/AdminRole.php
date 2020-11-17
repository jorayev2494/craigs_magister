<?php

namespace App\Models;

use App\Models\Interfaces\IBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'unblock_date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'unblock_date' => IBaseModel::FORMAT_DATETIME,
        'created_at' => IBaseModel::FORMAT_DATETIME,
        'updated_at' => IBaseModel::FORMAT_DATETIME,
    ];
}
