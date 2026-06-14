<?php

namespace App\Domains\Content\Providers;

use Illuminate\Support\Facades\Http;

class FootballApiProvider
{
    protected string $baseUrl;

    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.api_football.url');

        $this->apiKey = config('services.api_football.key');
    }

    /**
     * Cliente HTTP base
     */
    protected function client()
    {
        return Http::withHeaders([
            'x-apisports-key' => $this->apiKey,
            'Accept' => 'application/json',
        ]);
    }

    /**
     * Obtener fixtures por fecha
     */
    public function fixturesByDate(string $date): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures",
                [
                    'date' => $date,
                ]
            )
            ->throw()
            ->json();
    }

    /**
     * Obtener fixture por ID
     */
    public function fixture(int $fixtureId): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures",
                [
                    'id' => $fixtureId,
                ]
            )
            ->throw()
            ->json();
    }

    /**
     * Eventos del partido
     */
    public function fixtureEvents(int $fixtureId): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures/events",
                [
                    'fixture' => $fixtureId,
                ]
            )
            ->throw()
            ->json();
    }

    /**
     * Estadísticas del partido
     */
    public function fixtureStatistics(int $fixtureId): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures/statistics",
                [
                    'fixture' => $fixtureId,
                ]
            )
            ->throw()
            ->json();
    }

    /**
     * Alineaciones
     */
    public function fixtureLineups(int $fixtureId): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/fixtures/lineups",
                [
                    'fixture' => $fixtureId,
                ]
            )
            ->throw()
            ->json();
    }

    /**
     * Equipos
     */
    public function teams(array $params = []): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/teams",
                $params
            )
            ->throw()
            ->json();
    }

    /**
     * Jugadores
     */
    public function players(array $params = []): array
    {
        return $this->client()
            ->get(
                "{$this->baseUrl}/players",
                $params
            )
            ->throw()
            ->json();
    }
}