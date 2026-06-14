<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Mappers\FootballContentMapper;
use App\Domains\Content\Providers\FootballApiProvider;

class ContentSyncService
{
    public function __construct(
        protected FootballApiProvider $provider,
        protected FootballContentMapper $mapper
    ) {
    }

    public function syncToday(): void
    {
        $response =
            $this->provider
                ->fixturesByDate(
                    now()->toDateString()
                );

        foreach (
            $response['response']
            ?? []
            as $fixture
        ) {

            $data =
                $this->mapper
                    ->mapFixture(
                        $fixture
                    );

            Content::updateOrCreate(

                [
                    'provider' =>
                        $data['provider'],

                    'external_id' =>
                        $data['external_id']
                ],

                $data
            );
        }
    }
}