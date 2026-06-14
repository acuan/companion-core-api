<?php

namespace App\Domains\Chat\Services;

use App\Domains\Content\Models\Content;

class ContextBuilder
{
    public function build(
        Content $content
    ): array {

        return [

            'title' => $content->title,

            'status' => $content->status,

            'state' => $content->state
                ?->current_state,

            'events' => $content
                ->events()
                ->latest()
                ->limit(10)
                ->get()
                ->toArray()
        ];
    }
}