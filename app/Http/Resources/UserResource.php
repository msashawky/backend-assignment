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
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'weekly_visits_count' => $this->weekly_visits_count,
            'monthly_visits_count' => $this->monthly_visits_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
