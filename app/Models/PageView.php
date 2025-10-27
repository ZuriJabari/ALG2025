<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'url',
        'page_title',
        'referrer',
        'user_agent',
        'ip_address',
        'country',
        'device_type',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];
}
