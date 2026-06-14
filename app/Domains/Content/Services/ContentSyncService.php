<?php

namespace App\Domains\Content\Services;

use Carbon\Carbon;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Contracts\ContentProviderInterface;

class ContentSyncService
{
    public function __construct(
        protected ContentProviderInterface $provider
    ) {
    }

    public function sync(): int
    {
        $games =
            $this->provider
                ->games();

        $count = 0;

        foreach ($games as $game) {

            Content::updateOrCreate(

                [
                    'provider' =>
                        'worldcup2026',

                    'external_id' =>
                        $game['id'],
                ],

                [
                    'content_type' =>
                        'football_match',

                    'title' =>

                        trim(
                            ($game['home_team_name_en'] ?? '')
                            .' vs '.
                            ($game['away_team_name_en'] ?? '')
                        ),

                    'status' =>

                        strtolower(
                            $game['finished']
                            ?? 'false'
                        ) === 'true'

                            ? 'finished'

                            : 'scheduled',

                    'starts_at' =>

                        ! empty($game['local_date'])

                            ? Carbon::parse(
                                $game['local_date']
                            )

                            : null,

                    'metadata' => [

                        'group' =>
                            $game['group']
                            ?? null,

                        'matchday' =>
                            $game['matchday']
                            ?? null,

                        'stadium_id' =>
                            $game['stadium_id']
                            ?? null,

                        'home_team_id' =>
                            $game['home_team_id']
                            ?? null,

                        'away_team_id' =>
                            $game['away_team_id']
                            ?? null,

                        'home_score' =>
                            $game['home_score']
                            ?? 0,

                        'away_score' =>
                            $game['away_score']
                            ?? 0,

                        'home_scorers' =>
                            $game['home_scorers']
                            ?? null,

                        'away_scorers' =>
                            $game['away_scorers']
                            ?? null,
                    ],
                ]
            );

            $count++;
        }

        return $count;
    }
}
