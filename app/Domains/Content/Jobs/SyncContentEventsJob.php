<?php

namespace App\Domains\Content\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Domains\Content\Models\Content;
use App\Domains\Content\Services\SyncContentEventsService;

class SyncContentEventsJob
    implements ShouldQueue
{
    use Queueable;

    public function handle(
        SyncContentEventsService $service
    ): void {

        Content::query()

            ->where(
                'status',
                'live'
            )

            ->each(

                function (
                    Content $content
                ) use (
                    $service
                ) {

                    $service->sync(
                        $content
                    );
                }
            );
    }
}