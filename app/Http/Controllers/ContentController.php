<?php

namespace App\Http\Controllers;


use App\Domains\Content\Resources\ContentResource;
use App\Domains\Content\Resources\ContentDetailResource;
use App\Domains\Content\Services\ContentService;
use App\Domains\Content\Models\Content;


class ContentController extends Controller
{
    public function __construct(
        protected ContentService $service
    ) {
    }

    public function index()
    {
        return ContentResource::collection(
            $this->service->getTodayContents()
        );
    }

    public function show(Content $content)
    {
        return new ContentDetailResource(
            $content->load([
                'state',
                'events'
            ])
        );
    }
}