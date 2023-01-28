<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'company',
        'devisi',
        'user_id',
        'picture'
    ];

    protected $appends = [
        'has_media',
        'picture_url'
    ];

    public function getHasMediaAttribute()
    {
        return $this->hasMedia();
    }

    public function getPictureUrlAttribute()
    {
        return $this->hasMedia() 
            ? $this->getMedia()->last()->getFullUrl()
            : '';
    }

    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
