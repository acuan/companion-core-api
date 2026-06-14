<?php

namespace App\Domains\Content\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'title' => $this->title,

            'content_type' => $this->content_type,

            'status' => $this->status,

            'starts_at' => $this->starts_at,

            'image_url' => $this->image_url,
        ];
    }
}