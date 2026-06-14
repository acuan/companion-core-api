<?php

namespace App\Domains\Memory\Enums;

enum PersonaType: string
{
    case CASUAL = 'casual';

    case HISTORIAN = 'historian';

    case ANALYST = 'analyst';

    case MIXED = 'mixed';
}