<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


use App\Domains\Content\Jobs\SyncContentsJob;
use App\Domains\Content\Jobs\SyncContentEventsJob;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(
    new SyncContentsJob()
)->everyFifteenMinutes();

Schedule::job(
    new SyncContentEventsJob()
)->everyThirtySeconds();