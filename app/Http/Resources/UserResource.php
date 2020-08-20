<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'weekly_visits_count' => $this->weekly_visits_count,
            'monthly_visits_count' => $this->monthly_visits_count,
        ];
    }

}
