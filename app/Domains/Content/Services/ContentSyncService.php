<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Mappers\FootballContentMapper;
use App\Domains\Content\Providers\FootballApiProvider;

class ContentSyncService
{
    public function __construct(
        protected FootballApiProvider $provider,
        protected FootballContentMapper $mapper,
        protected ContentStateService $stateService
    ) {
    }

    public function syncToday(): int
    {
        $response = $this->provider->fixturesByDate(
            now()->toDateString()
        );

        $count = 0;

        foreach ($response['response'] ?? [] as $fixture) {

            $this->syncFixture($fixture);

            $count++;
        }

        return $count;
    }

    public function syncFixture(
        array $fixture
    ): Content {

        $data = $this->mapper->mapFixture(
            $fixture
        );

        $content = Content::updateOrCreate(

            [
                'provider'    => $data['provider'],
                'external_id' => $data['external_id'],
            ],

            $data
        );

        $this->stateService->update(
            $content,
            $fixture
        );

        return $content;
    }
}