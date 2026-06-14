<?php

namespace App\Domains\Content\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray(
        Request $request
    ): array {

        return [

            'id' =>
                $this->id,

            'name' =>
                $this->name,

            'fifa_code' =>
                $this->fifa_code,

            'iso2' =>
                $this->iso2,

            'group_code' =>
                $this->group_code,

            'flag_url' =>
                $this->flag_url,
        ];
    }
}
