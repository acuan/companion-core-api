<?php

namespace App\Domains\Content\Enums;

enum ContentStatus: string
{
    case SCHEDULED = 'scheduled';

    case LIVE = 'live';

    case FINISHED = 'finished';

    case CANCELLED = 'cancelled';
}