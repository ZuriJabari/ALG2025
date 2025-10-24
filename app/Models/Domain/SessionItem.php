<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SessionItem extends Model
{
    protected $fillable = [
        'session_id',
        'title',
        'subtitle',
        'description',
        'moderator_id',
        'ordering',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function moderator(): BelongsTo
    {
        return $this->belongsTo(Speaker::class, 'moderator_id');
    }

    public function speakers(): BelongsToMany
    {
        return $this->belongsToMany(Speaker::class, 'session_item_speaker')
            ->withPivot(['role', 'ordering'])
            ->withTimestamps()
            ->orderBy('session_item_speaker.ordering');
    }
}
