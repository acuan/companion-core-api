<?php

namespace App\Http\Controllers;

use App\Domains\Content\Models\Team;
use App\Domains\Content\Services\TeamService;
use App\Domains\Content\Resources\TeamResource;

class TeamController extends Controller
{
    public function __construct(
        protected TeamService $service
    ) {
    }

    public function index()
    {
        return TeamResource::collection(
            $this->service->all()
        );
    }

    public function show(
        Team $team
    )
    {
        return new TeamResource(
            $team
        );
    }
}
