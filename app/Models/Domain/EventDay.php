<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventDay extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'theme',
        'date',
        'ordering',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'day_id')->orderBy('ordering');
    }

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speaker::class, 'event_day_speaker')
            ->withPivot(['role', 'ordering'])
            ->withTimestamps()
            ->orderBy('event_day_speaker.ordering');
    }
}
