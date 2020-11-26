<?php

namespace App\Models\Announcements\Base;

use App\Models\City;
use App\Models\Country;
use App\Models\Interfaces\IBaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Psy\Util\Json;

class Announcement extends Model
{
    use HasFactory;

    public const STATUS_WAITING = 'waiting';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_WAS_APPEALED = 'was_appealed';

    public const PRICE_PER_HOUR = 'hour';
    public const PRICE_PER_DAY = 'day';
    public const PRICE_PER_MONTH = 'month';
    public const PRICE_PER_YEAR = 'year';

    public const CONCRETE_PREFIX = 'concrete';

    public const IMAGE_MIMES = [
        'jpg',
        'jpeg',
        'png',
        'gif'
    ];

    public const PRICE_PERMISSIONS = [
        self::PRICE_PER_HOUR,
        self::PRICE_PER_DAY,
        self::PRICE_PER_MONTH,
        self::PRICE_PER_YEAR,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'price_per',
        'is_price_contractual',
        'status',
        'status_cancelled_description',
        'category_id',
        'location',
        'location_country_id',
        'location_city_id',
        'location_google_latitude',
        'location_google_longitude',
        'images',
        'video',
        'viewed',
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
        // 'images' => 'json',
    ];

    protected $with = [
        // 'category',
        // 'concrete'
    ];

    public function getImagePath(): string
    {
        $className = $this->category->getConcreteModel();
        return '/images/announcement/' . strtolower(class_basename($className)) . '/';
    }

    public function getRateAttribute(): float
    {
        $rate = $this->attributes['rate'] ?: 0;
        return number_format($rate, 1, '.', ',') ;
    }

    public function setImagesAttribute(array $images): void
    {
        $value = json_encode($images, JSON_FORCE_OBJECT);
        $this->attributes['images'] = $value;
    }

    public function getImagesAttribute()
    {
        return json_decode($this->attributes['images'], true);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function concrete(): HasOne
    {
        return $this->hasOne($this->category->getConcreteModel(), 'announcement_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'location_country_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'location_city_id', 'id');
    }

}
