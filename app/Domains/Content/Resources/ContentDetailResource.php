<?php

namespace App\Domains\Content\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'title' => $this->title,

            'content_type' => $this->content_type,

            'status' => $this->status,

            'state' => $this->state,

            'events' => $this->events
                ->take(20),
        ];
    }
}