<?php

namespace App\Models;

use App\Models\Abstracts\JWTAuthModel;
use App\Models\Announcements\Base\Announcement;
use App\Models\Interfaces\IBaseModel;
use App\Models\Interfaces\IBaseUserModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $avatar
 * @property string $avatar
 * @property string $password
 * @property string $about
 * @property string $email_confirmation
 * @property bool $active
 * @property \DateTime $unblock_date
 * @property string $remember_token
 * @property \DateTime $last_login
 * @property \DateTime $last_activity
 * @property \DateTime $last_activity
 */
final class User extends JWTAuthModel implements IBaseUserModel
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
        'avatar',
        'email',
        'phone',
        'password',
        'about',
        'location_country_id',
        'location_city_id',
        'email_confirmed',
        'active',
        'unblock_date',
        'remember_token',
        'last_login',
        'last_activity',
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
        'email_confirmed' => 'boolean',
        'active' => 'boolean',
        'is_verified' => 'boolean',
        'email_verified_at' => 'datetime',
        'created_at' =>  IBaseModel::FORMAT_DATETIME,
        'updated_at' =>  IBaseModel::FORMAT_DATETIME,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
    ];

    public function getAvatarPath(): string
    {
        return '/images/portrait/small/';
    }

    // private function getAvatarUrl(): string
    // {
    //     return '/images/avatar/';
    // }

    #region Relationships
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class, 'creator_id', 'id');
    }

    public function announcementComplaints(): HasMany
    {
        return $this->hasMany(AnnouncementComplaint::class, 'creator_id', 'id');
    }

    public function announcementReviews(): HasMany
    {
        return $this->hasMany(AnnouncementReview::class, 'creator_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(UserReview::class, 'user_id', 'id');
    }

    public function creatorReviews(): HasMany
    {
        return $this->hasMany(UserReview::class, 'creator_id', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'location_country_id', 'id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'location_city_id', 'id');
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }

    public function recentActivities(): HasMany
    {
        return $this->hasMany(RecentActivity::class, 'user_id', 'id');
    }

    public function fromRecentActivities(): HasMany
    {
        return $this->hasMany(RecentActivity::class, 'from_user_id', 'id');
    }


    #endregion
}
