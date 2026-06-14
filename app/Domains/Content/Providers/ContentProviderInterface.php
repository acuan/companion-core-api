<?php

namespace App\Domains\Content\Contracts;

interface ContentProviderInterface
{
    public function games(): array;

    public function game(
        string $id
    ): array;

    public function teams(): array;

    public function team(
        string $id
    ): array;

    public function groups(): array;

    public function group(
        string $id
    ): array;

    public function stadiums(): array;

    public function stadium(
        string $id
    ): array;
}