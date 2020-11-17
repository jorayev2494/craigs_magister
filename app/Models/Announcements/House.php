<?php

namespace App\Models\Announcements;

use App\Models\Announcements\Base\Announcement;
use App\Models\Announcements\Base\Concrete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_area',
        'exchange_possibility',
        'floor',
        'property_type',
        'number_of_storeys',
        'quantity_rooms'
    ];

    public function announcement(): BelongsTo 
    {
        return $this->belongsTo(Concrete::class, 'body_id', 'id');
    }

}