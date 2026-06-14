<?php

namespace App\Domains\Content\Mappers;

class WorldCup2026Mapper
{
    public function mapGame(
        array $game
    ): array {

        return [

            'provider' =>
                'worldcup2026',

            'external_id' =>
                $game['id'],

            'title' =>
                $game['home_team_name_en']
                .' vs '.
                $game['away_team_name_en'],

            'status' =>
                strtolower(
                    $game['finished']
                ) === 'true'
                    ? 'finished'
                    : 'scheduled',

            'starts_at' =>
                $game['local_date'],

            'metadata' => [

                'group' =>
                    $game['group'],

                'matchday' =>
                    $game['matchday'],

                'stadium_id' =>
                    $game['stadium_id'],
            ],
        ];
    }
}