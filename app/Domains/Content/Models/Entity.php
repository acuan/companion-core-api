<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'external_id',
        'entity_type',
        'name',
        'image_url',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function outgoingRelations()
    {
        return $this->hasMany(
            EntityRelation::class,
            'source_entity_id'
        );
    }

    public function incomingRelations()
    {
        return $this->hasMany(
            EntityRelation::class,
            'target_entity_id'
        );
    }
}