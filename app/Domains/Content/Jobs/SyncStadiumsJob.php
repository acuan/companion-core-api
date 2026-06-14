<?php

namespace App\Domains\Content\Jobs;

use App\Domains\Content\Models\Stadium;
use App\Domains\Content\Providers\WorldCup2026Provider;

class SyncStadiumsJob
{
    public function __construct(
        protected WorldCup2026Provider $provider
    ) {
    }

    public function handle(): void
    {
        $response =
            $this->provider
                ->stadiums();

        foreach ( $response as $stadium ) {

            Stadium::updateOrCreate(

                [
                    'provider' => 'worldcup2026',

                    'external_id' =>
                        $stadium['id'],
                ],

                [
                    'name' =>
                        $stadium['name_en'],

                    'fifa_name' =>
                        $stadium['fifa_name']
                        ?? null,

                    'city' =>
                        $stadium['city_en']
                        ?? null,

                    'country' =>
                        $stadium['country_en']
                        ?? null,

                    'capacity' =>
                        $stadium['capacity']
                        ?? null,

                    'region' =>
                        $stadium['region']
                        ?? null,
                ]
            );
        }
    }
}