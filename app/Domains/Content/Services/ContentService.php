<?php

namespace App\Domains\Content\Services;

use App\Domains\Content\Models\Content;

class ContentService
{
    public function getLiveContents()
    {
        return Content::query()
            ->where('status', 'live')
            ->orderBy('starts_at')
            ->get();
    }

    public function getTodayContents()
    {
        return Content::query()
            ->whereDate(
                'starts_at',
                today()
            )
            ->orderBy('starts_at')
            ->get();
    }

    public function find(int $id): Content
    {
        return Content::query()
            ->with([
                'state',
                'events'
            ])
            ->findOrFail($id);
    }

    public function getContents()
    {
        return Content::query()
        ->where(
        'content_type',
        'football_match'
        )
        ->orderBy('starts_at')
        ->get();
    }

}