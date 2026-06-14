<?php

namespace App\Domains\Content\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentDetailResource extends JsonResource
{
    public function toArray(
        Request $request
    ): array {

        return [

            'id' => $this->id,

            'title' => $this->title,

            'content_type' =>
                $this->content_type,

            'status' =>
                $this->status,

            'starts_at' =>
                $this->starts_at,

            'group' =>
                data_get(
                    $this->metadata,
                    'group'
                ),

            'matchday' =>
                data_get(
                    $this->metadata,
                    'matchday'
                ),

            'stadium_id' =>
                data_get(
                    $this->metadata,
                    'stadium_id'
                ),

            'home_score' =>
                data_get(
                    $this->metadata,
                    'home_score'
                ),

            'away_score' =>
                data_get(
                    $this->metadata,
                    'away_score'
                ),

            'home_scorers' =>
                data_get(
                    $this->metadata,
                    'home_scorers'
                ),

            'away_scorers' =>
                data_get(
                    $this->metadata,
                    'away_scorers'
                ),
        ];
    }
}
