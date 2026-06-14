<?php

namespace App\Domains\Content\Providers;

use Illuminate\Support\Facades\Http;
use App\Domains\Content\Contracts\ContentProviderInterface;


class WorldCup2026Provider implements ContentProviderInterface
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(
            config('services.worldcup2026.base_url'),
            '/'
        );
    }

    protected function get(string $endpoint): array
    {
        return Http::timeout(15)
            ->get(
                "{$this->baseUrl}/{$endpoint}"
            )
            ->throw()
            ->json();
    }

    public function games(): array
    {
        return $this->get('games');
    }

    public function game(string $id): array
    {
        return $this->get("game/{$id}");
    }

    public function teams(): array
    {
        return $this->get('teams');
    }

    public function team(string $id): array
    {
        return $this->get("team/{$id}");
    }

    public function groups(): array
    {
        return $this->get('groups');
    }

    public function group(string $id): array
    {
        return $this->get("group/{$id}");
    }

    public function stadiums(): array
    {
        return $this->get('stadiums');
    }

    public function stadium(string $id): array
    {
        return $this->get("stadium/{$id}");
    }
}