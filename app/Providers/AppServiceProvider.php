<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Content\Contracts\ContentProviderInterface;
use App\Domains\Content\Providers\WorldCup2026Provider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(
            ContentProviderInterface::class,
            WorldCup2026Provider::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
