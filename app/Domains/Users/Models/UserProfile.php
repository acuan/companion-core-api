<?php

namespace App\Domains\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'persona',
        'persona_confidence',
        'preferences',
        'memory'
    ];

    protected $casts = [
        'preferences' => 'array',
        'memory' => 'array',
        'persona_confidence' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}