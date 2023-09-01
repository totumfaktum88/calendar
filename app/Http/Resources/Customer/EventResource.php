<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title" => $this->full_name,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "start" => $this->start->format("Y-m-d H:i"),
            "end" => $this->end->format("Y-m-d H:i"),
        ];
    }
}
