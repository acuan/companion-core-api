<?php

namespace App\Domains\Content\Enums;

enum EventType: string
{
    case MATCH_STARTED = 'match_started';

    case GOAL = 'goal';

    case YELLOW_CARD = 'yellow_card';

    case RED_CARD = 'red_card';

    case SUBSTITUTION = 'substitution';

    case HALF_TIME = 'half_time';

    case MATCH_ENDED = 'match_ended';
}