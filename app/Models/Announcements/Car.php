<?php

namespace App\Models\Announcements;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'announcement_id',
        'marka',
        'model',
        'year',
        'engine',
        'color',
        'transmission',
        'drive_unit',
        'exchange'
    ];

    public const VALIDATION_RULES = [
        'marka' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|string',
        'engine' => 'required|string',
        'color' => 'required|string',
        'transmission' => 'required|string',
        'drive_unit' => 'required|string',
        'exchange_possibility' => 'nullable|boolean',
    ];
}
