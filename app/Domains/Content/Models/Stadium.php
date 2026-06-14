<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stadium extends Model
{
    use HasFactory;

    protected $fillable = [

        'provider',
        'external_id',
        'name',
        'fifa_name',
        'city',
        'country',
        'capacity',
        'region',
    ];

    protected $casts = [

        'external_id' => 'string',

        'capacity' => 'integer',
    ];
}
