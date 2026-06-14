<?php

namespace App\Domains\Content\Jobs;

use App\Domains\Content\Models\Team;
use App\Domains\Content\Providers\WorldCup2026Provider;

class SyncTeamsJob
{
    public function handle(
        WorldCup2026Provider $provider
    ): void {

        $response =
            $provider->teams();

        foreach ( $response  as $team
        ) {

            Team::updateOrCreate(

                [
                    'provider' => 'worldcup2026',

                    'external_id' =>
                        $team['id']
                ],

                [
                    'name' =>
                        $team['name_en'],

                    'fifa_code' =>
                        $team['fifa_code'],

                    'iso2' =>
                        $team['iso2'],

                    'group_code' =>
                        $team['groups'],

                    'flag_url' =>
                        $team['flag']
                ]
            );
        }
    }
}