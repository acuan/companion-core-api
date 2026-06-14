<?php

namespace App\Domains\Memory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

class UserMemorySnapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'memory'
    ];

    protected $casts = [
        'memory' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}