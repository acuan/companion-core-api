<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Models\ContentEvent;

class SyncContentEventsService
{
    public function __construct(
        protected FootballApiService $football
    ) {
    }

    public function sync(
        Content $content
    ): void {

        $events =
            $this->football
                ->fixtureEvents(
                    $content->external_id
                );

        foreach (
            $events['response']
            ?? []
            as $event
        ) {

            ContentEvent::updateOrCreate(

                [
                    'content_id' => $content->id,

                    'external_event_id' =>
                        md5(
                            json_encode(
                                $event
                            )
                        )
                ],

                [
                    'event_type' =>
                        $event['type'],

                    'payload' =>
                        $event
                ]
            );
        }
    }
}