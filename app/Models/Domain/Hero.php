<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Hero extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'event_id',
        'title',
        'description',
        'cta_label',
        'cta_url',
        'active',
        'ordering',
        'content_type',
        'video_url',
        'video_type',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero')->useDisk('public')->singleFile();
        $this->addMediaCollection('pattern')->useDisk('public')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('hero_web')
            ->format('webp')
            ->width(1920)
            ->height(1080)
            ->nonQueued();
    }
}
