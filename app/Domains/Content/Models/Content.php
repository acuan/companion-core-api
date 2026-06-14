<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Domains\Chat\Models\Conversation;
use App\Domains\Insights\Models\Insight;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'external_id',
        'content_type',
        'title',
        'description',
        'image_url',
        'status',
        'starts_at',
        'ends_at',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime'
    ];

    public function state()
    {
        return $this->hasOne(ContentState::class);
    }

    public function events()
    {
        return $this->hasMany(ContentEvent::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function insights()
    {
        return $this->hasMany(Insight::class);
    }
}
