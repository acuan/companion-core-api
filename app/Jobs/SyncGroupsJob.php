<?php

namespace App\Domains\Content\Jobs;

use App\Domains\Content\Models\Group;
use App\Domains\Content\Providers\WorldCup2026Provider;

class SyncGroupsJob
{
    public function __construct(
        protected WorldCup2026Provider $provider
    ) {
    }

    public function handle(): void
    {
        $response =
            $this->provider
                ->groups();

        foreach (
            $response['groups']
            ?? []
            as $group
        ) {

            Group::updateOrCreate(

                [
                    'provider' => 'worldcup2026',

                    'name' =>
                        $group['name'],
                ],

                [
                    'external_id' =>
                        $group['_id']
                        ?? null,

                    'standings' =>
                        $group['teams']
                        ?? [],
                ]
            );
        }
    }
}