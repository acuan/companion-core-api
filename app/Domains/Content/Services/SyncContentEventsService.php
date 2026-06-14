<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Models\ContentEvent;

use App\Domains\Content\Providers\FootballApiProvider;

class SyncContentEventsService
{
    public function __construct(
        protected FootballApiProvider $provider,

    ) {
    }

    public function sync(
        Content $content
    ): int {

        $events =
            $this->provider
                ->fixtureEvents(
                    $content->external_id
                );

        $count = 0;

        foreach (
            $events['response']
            ?? []
            as $event
        ) {

            ContentEvent::updateOrCreate(

                [
                    'content_id' =>
                        $content->id,

                    'external_event_id' =>
                        md5(
                            json_encode(
                                $event
                            )
                        ),
                ],

                [

                    'event_type' =>
                        $event['type'],

                    'event_time' =>
                        now(),

                    'payload' =>
                        $event,
                ]
            );

            $count++;
        }

        return $count;
    }
}