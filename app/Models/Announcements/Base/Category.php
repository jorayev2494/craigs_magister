<?php

namespace App\Models\Announcements\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'model',
        'unblock_date'
    ];

    public function setSlugAttribute(string $value): void
    {
        $this->attributes['slug'] = strtolower($value);
    }

    public function setModelAttribute(string $value): void
    {
        $this->attributes['model'] = ucfirst($value);
    }

    public function getConcreteModel(): string
    {
        return "\App\Models\Announcements\\{$this->model}";
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class, 'category_id', 'id');
    }

    
}
