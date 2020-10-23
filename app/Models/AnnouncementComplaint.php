<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementComplaint extends Model
{
    use HasFactory;

    public const STATUS_WAITING = 'waiting';
    public const STATUS_REVIEWED = 'reviewed';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'announcement_id',
        'creator_id',
        'description',
        'status'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

}
