<?php

namespace App\Domains\Content\Mappers;

use Carbon\Carbon;
use App\Domains\Content\Enums\ContentType;

class FootballContentMapper
{
    public function mapFixture(array $fixture): array
    {
        return [

            'provider' => 'api-football',

            'external_id' =>
                $fixture['fixture']['id'],

            'content_type' =>
                ContentType::FOOTBALL_MATCH->value,

            'title' =>
                $fixture['teams']['home']['name']
                .' vs '.
                $fixture['teams']['away']['name'],

            'status' =>
                $fixture['fixture']['status']['short'],

            'starts_at' =>
                Carbon::parse(
                    $fixture['fixture']['date']
                ),

            'metadata' => [
                'fixture' => $fixture
            ]
        ];
    }
}