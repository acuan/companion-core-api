<?php

namespace App\Domains\Content\Providers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

use App\Domains\Content\Contracts\ContentProviderInterface;

class WorldCup2026Provider implements ContentProviderInterface
{
    public const PROVIDER = 'worldcup2026';

    protected string $baseUrl;

    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(
            config('services.worldcup2026.base_url'),
            '/'
        );

        $this->apiKey = config(
            'services.worldcup2026.key'
        );
    }

    protected function client(): PendingRequest
    {
        return Http::timeout(15)
            ->acceptJson()
            ->withToken(
                $this->apiKey
            );
    }

    protected function get(
        string $endpoint
    ): array {

        return $this->client()

            ->get(
                "{$this->baseUrl}/{$endpoint}"
            )

            ->throw()

            ->json();
    }

    public function games(): array
    {
        $response =
            $this->get(
                'games'
            );

        return $response['games']
            ?? [];
    }

    public function game(
        string $id
    ): array
    {
        return $this->get(
            "game/{$id}"
        );
    }

    public function teams(): array
    {
        return $this->get(
            'teams'
        )['teams'] ?? [];
    }

    public function team(
        string $id
    ): array
    {
        return $this->get(
            "team/{$id}"
        );
    }

    public function groups(): array
    {
        return $this->get(
            'groups'
        )['groups'] ?? [];
    }

    public function group(
        string $id
    ): array
    {
        return $this->get(
            "group/{$id}"
        );
    }

    public function stadiums(): array
    {
        return $this->get(
            'stadiums'
        )['stadiums'] ?? [];
    }

    public function stadium(
        string $id
    ): array
    {
        return $this->get(
            "stadium/{$id}"
        );
    }
}

