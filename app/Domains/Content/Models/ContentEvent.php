<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'external_event_id',
        'event_type',
        'event_time',
        'payload'
    ];

    protected $casts = [
        'event_time' => 'datetime',
        'payload' => 'array'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
