<?php

namespace App\Models;

use App\Models\Interfaces\IBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    use HasFactory;

    public const STATUS_PUBLISHED = 'published';
    public const STATUS_PUBLISH_DATE = 'publish_date';
    public const STATUS_AWAITING = 'awaiting';
    public const STATUS_BLOCKED = 'blocked';

    public const STATUSES = [
        self::STATUS_PUBLISHED,
        self::STATUS_PUBLISH_DATE,
        self::STATUS_AWAITING,
        self::STATUS_BLOCKED
    ];

    public const MEDIA_CONTENT_MIMETYPES = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif',
        'video/mp4',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'media_content_id',
        'user_id',
        'admin_id',
        'description',
        'status',
        'blocked_description',
        'publish',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => IBaseModel::FORMAT_DATETIME,
        'updated_at' => IBaseModel::FORMAT_DATETIME,
    ];

    public function getMediaContentPath(): string
    {
        return '/blogs/media_content/';
    }

    public function getDefaultMediaContent(): string
    {
        return sprintf('%s%s', $this->getMediaContentPath(), 'default.jpg');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function mediaContent(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'media_content_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}
