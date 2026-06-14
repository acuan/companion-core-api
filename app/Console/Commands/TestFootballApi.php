<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domains\Content\Providers\FootballApiProvider;

class TestFootballApi extends Command
{
    protected $signature = 'football:test';

    protected $description = 'Test API Football';

    public function handle(
        FootballApiProvider $provider
    ): int {

        $response = $provider->fixturesByDate(
            now()->toDateString()
        );

        dump($response);

        return self::SUCCESS;
    }
}