<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Session extends Model
{
    protected $table = 'event_sessions';

    protected $fillable = [
        'event_id',
        'day_id',
        'title',
        'theme',
        'start_time',
        'end_time',
        'ordering',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(EventDay::class, 'day_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(SessionItem::class, 'session_id')->orderBy('ordering');
    }

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speaker::class, 'session_speaker')
            ->withPivot(['role', 'ordering'])
            ->withTimestamps()
            ->orderBy('session_speaker.ordering');
    }
}
