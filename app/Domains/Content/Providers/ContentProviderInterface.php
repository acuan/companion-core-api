<?php

namespace App\Domains\Content\Providers;

interface ContentProviderInterface
{
    public function fixtures(): array;

    public function fixture(
        string $id
    ): array;

    public function teams(): array;

    public function groups(): array;

    public function stadiums(): array;
}