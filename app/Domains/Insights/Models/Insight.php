<?php

namespace App\Domains\Insights\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Models\ContentEvent;

class Insight extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'content_event_id',
        'category',
        'title',
        'content',
        'score',
        'source'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function event()
    {
        return $this->belongsTo(
            ContentEvent::class,
            'content_event_id'
        );
    }
}