<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Speaker extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'title',
        'company',
        'category',
        'slug',
        'short_bio',
        'quote',
        'twitter',
        'linkedin',
        'website',
        'ordering',
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)
            ->withPivot(['role', 'ordering'])
            ->withTimestamps();
    }

    public function eventDays(): BelongsToMany
    {
        return $this->belongsToMany(EventDay::class, 'event_day_speaker')
            ->withPivot(['role', 'ordering'])
            ->withTimestamps()
            ->orderBy('event_day_speaker.ordering');
    }

    public function sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class, 'session_speaker')
            ->withPivot(['role', 'ordering'])
            ->withTimestamps()
            ->orderBy('session_speaker.ordering');
    }

    protected static function booted(): void
    {
        static::creating(function (Speaker $speaker) {
            if (empty($speaker->slug) && !empty($speaker->name)) {
                $base = Str::slug($speaker->name);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $speaker->slug = $slug;
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('headshot')
            ->useDisk('public')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('avatar')
            ->format('webp')
            ->width(512)
            ->height(512)
            ->nonQueued();
    }
}
