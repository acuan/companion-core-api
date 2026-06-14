<?php

namespace App\Domains\Content\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_entity_id',
        'target_entity_id',
        'relation_type',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function source()
    {
        return $this->belongsTo(
            Entity::class,
            'source_entity_id'
        );
    }

    public function target()
    {
        return $this->belongsTo(
            Entity::class,
            'target_entity_id'
        );
    }
}