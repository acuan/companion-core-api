<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Group;
use Illuminate\Database\Eloquent\Collection;

class GroupService
{
    public function all(): Collection
    {
        return Group::query()
            ->orderBy('name')
            ->get();
    }

    public function find(
        int $id
    ): Group {

        return Group::query()
            ->findOrFail($id);
    }
}
