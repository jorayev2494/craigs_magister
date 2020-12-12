<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'path',
        'name',
        'user_file_name',
        'size',
        'mime_type',
    ];

    public function blog(): HasOne
    {
        return $this->hasOne(Blog::class, 'media_content_id', 'id');
    }
}
