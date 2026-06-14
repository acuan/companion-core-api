<?php

namespace App\Domains\Content\Providers;

use Illuminate\Support\Facades\Http;

class FootballApiProvider
{
    protected string $baseUrl;

    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl =
            config('services.api_football.url');

        $this->apiKey =
            config('services.api_football.key');
    }

    protected function client()
    {
        return Http::withHeaders([
            'x-apisports-key' => $this->apiKey
        ]);
    }

    public function fixtures()
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures"
            )
            ->json();
    }

    public function fixture(int $id)
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures",
                [
                    'id' => $id
                ]
            )
            ->json();
    }

    public function events(int $id)
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures/events",
                [
                    'fixture' => $id
                ]
            )
            ->json();
    }
}