<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class Event extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'year',
        'slug',
        'title',
        'subtitle',
        'description',
        'start_at',
        'location',
        'hashtag',
        'primary_cta_label',
        'primary_cta_url',
        'secondary_cta_label',
        'secondary_cta_url',
        'is_featured',
        'status',
        'ordering',
        'display_year',
        'hero_title',
        'hero_description',
        'hero_cta_label',
        'hero_cta_url',
        'hero_image_path',
        'hero_content_type',
        'hero_video_url',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speaker::class)
            ->withPivot(['role', 'ordering'])
            ->withTimestamps()
            ->orderBy('event_speaker.ordering');
    }

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class)->orderBy('ordering');
    }

    public function days(): HasMany
    {
        return $this->hasMany(EventDay::class)->orderBy('ordering');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'event_id')->orderBy('ordering');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero')
            ->useDisk('public')
            ->singleFile();
        $this->addMediaCollection('pattern')
            ->useDisk('public')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('hero_web')
            ->format('webp')
            ->width(1920)
            ->height(1080)
            ->nonQueued();

        $this->addMediaConversion('thumb')
            ->format('webp')
            ->width(400)
            ->height(225)
            ->nonQueued();
    }

    protected static function booted(): void
    {
        static::creating(function (Event $event) {
            if (empty($event->slug)) {
                $base = Str::slug(($event->year ?: '').' '.$event->title);
                $base = trim($base) !== '' ? $base : Str::random(8);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $event->slug = $slug;
            }
        });
    }
}

