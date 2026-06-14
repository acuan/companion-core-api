<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Content;

class ContentStateService
{
    public function update(
        Content $content,
        array $fixture
    ): void {

        $content->state()->updateOrCreate(

            [
                'content_id' => $content->id
            ],

            [
                'current_state' => [

                    'minute' =>
                        $fixture['fixture']['status']['elapsed'],

                    'status' =>
                        $fixture['fixture']['status']['short'],

                    'score_home' =>
                        $fixture['goals']['home'],

                    'score_away' =>
                        $fixture['goals']['away'],

                    'updated_at' =>
                        now()->toDateTimeString(),
                ]
            ]
        );
    }
}