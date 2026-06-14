<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [

        'provider',
        'external_id',
        'name',
        'fifa_code',
        'iso2',
        'group_code',
        'flag_url',
    ];

    protected $casts = [
        'external_id' => 'string',
    ];
}
