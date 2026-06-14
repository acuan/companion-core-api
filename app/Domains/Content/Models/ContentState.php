<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentState extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'current_state'
    ];

    protected $casts = [
        'current_state' => 'array'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}