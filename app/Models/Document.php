<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'signing',
        'uploader',
        'signed_at'
    ];

    protected $appends = [
        'has_media',
        'picture_url'
    ];

    public function getHasMediaAttribute()
    {
        return $this->hasMedia('document');
    }

    public function getPictureUrlAttribute()
    {
        return $this->hasMedia('document') 
            ? $this->getMedia('document')->last()->getFullUrl()
            : '';
    }

    public function signing_id(): BelongsTo
    {
        return $this->belongsTo(User::class, 'signing', 'id');
    }

    public function uploader_id(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploader', 'id');
    }
}
