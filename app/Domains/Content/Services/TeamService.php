<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamService
{
    public function all(): Collection
    {
        return Team::query()
            ->orderBy('name')
            ->get();
    }

    public function find(
        int $id
    ): Team {

        return Team::query()
            ->findOrFail($id);
    }
}
