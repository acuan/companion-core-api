<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Domains\Content\Services\ContentSyncService;

class CompanionSync extends Command
{
    protected $signature =
        'companion:sync';

    protected $description =
        'Sync contents from providers';

    public function handle(
        ContentSyncService $service
    ): int {

        $count =
            $service->syncToday();

        $this->info(
            "{$count} contents synced"
        );

        return self::SUCCESS;
    }
}