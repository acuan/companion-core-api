<?php

namespace App\Http\Controllers;

use App\Domains\Content\Models\Group;
use App\Domains\Content\Services\GroupService;
use App\Domains\Content\Resources\GroupResource;

class GroupController extends Controller
{
    public function __construct(
        protected GroupService $service
    ) {
    }

    public function index()
    {
        return GroupResource::collection(
            $this->service->all()
        );
    }

    public function show(
        Group $group
    )
    {
        return new GroupResource(
            $group
        );
    }
}
