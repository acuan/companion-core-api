<?php

namespace App\Domains\Content\Enums;

enum ContentType: string
{
    case FOOTBALL_MATCH = 'football_match';

    public function label(): string
    {
        return match ($this) {
            self::FOOTBALL_MATCH => 'Football Match',
        };
    }
}