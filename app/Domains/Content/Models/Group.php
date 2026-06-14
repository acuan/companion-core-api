<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'provider',
        'external_id',
        'name',
        'standings',
    ];

    protected $casts = [
        'standings' => 'array',
    ];
}