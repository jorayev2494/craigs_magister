<?php

namespace App\Models\Announcements\Base;

use App\Models\AnnouncementReview;
use App\Models\City;
use App\Models\Country;
use App\Models\Interfaces\IBaseModel;
use App\Models\RecentActivity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Psy\Util\Json;

class Announcement extends Model
{
    use HasFactory;

    public const IMAGE_DEFAULT_WITH = "150"; // widths, 640px or 320px

    public const STATUS_APPROVED = 'approved';
    public const STATUS_WAITING = 'waiting';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_BLOCKED = 'blocked';
    public const STATUS_WAS_APPEALED = 'was_appealed';

    public const PRICE_PER_HOUR = 'hour';
    public const PRICE_PER_DAY = 'day';
    public const PRICE_PER_MONTH = 'month';
    public const PRICE_PER_YEAR = 'year';

    public const CONCRETE_PREFIX = 'concrete';

    public const STATUSES = [
        self::STATUS_WAITING,
        self::STATUS_APPROVED,
        self::STATUS_CANCELLED,
        self::STATUS_WAS_APPEALED,
        self::STATUS_BLOCKED
    ];

    public const STATUS_CANCELS = [
        self::STATUS_CANCELLED,
        // self::STATUS_WAS_APPEALED,
        self::STATUS_BLOCKED
    ];

    public const PRICE_PERMISSIONS = [
        self::PRICE_PER_HOUR,
        self::PRICE_PER_DAY,
        self::PRICE_PER_MONTH,
        self::PRICE_PER_YEAR,
    ];

    public const IMAGE_MIMES = [
        'jpg',
        'jpeg',
        'png',
        'gif'
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
        'status_blocked_description',
        'category_id',
        'location',
        'country_id',
        'city_id',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'front_end_price'
    ];

    public function getImagePath(): string
    {
        $className = $this->category->getConcreteModel();
        return '/images/announcement/' . strtolower(class_basename($className)) . '/';
    }

    public function getImageUrl(): string
    {
        return $this->getImagePath() . self::IMAGE_DEFAULT_WITH . '/';
    }

    public function getRateAttribute(): float
    {
        $reviews = $this->reviews()->select('rating')->get();

        if ($reviews->isNotEmpty()) {
            $number = $reviews->sum('rating')  /  $reviews->count();
            return number_format($number, 2, '.', ',');
        }

        return 0;
    }

    public function setImagesAttribute(array $images): void
    {
        $value = json_encode($images, JSON_FORCE_OBJECT);
        $this->attributes['images'] = $value;
    }

    public function getImagesAttribute()
    {
        $responseImgs = [];
        foreach (json_decode($this->attributes['images'], true) as $key => $image) {
            $responseImgs[$key] = "/storage{$this->getImageUrl()}" . $image;
        };

        return $responseImgs;
    }

    public function getFrontEndPriceAttribute(): string
    {
        return $this->attributes['price'] . ' TM';
    }

    public function getIsPriceContractualAttribute(): string
    {
        return $this->attributes['is_price_contractual'] == true ? 'yes' : 'no';
    }

    public function setIsPriceContractualAttribute($value): void
    {
        $this->attributes['is_price_contractual'] = $value == true || $value == 'yes';
    }

    public function getUnblockDateAttribute(): string
    {
        return $this->attributes['unblock_date'] == null 
                                                ? 'no blocked'
                                                : $this->attributes['unblock_date'];    // ->format(IBaseModel::FORMAT_VALIDATE);
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
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(AnnouncementReview::class, 'announcement_id', 'id');
    }

    public function recentActivities(): HasMany
    {
        return $this->hasMany(RecentActivity::class, 'announcement_id', 'id');
    }
}
