<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BackgroundEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "display" => "background",
            "startRecur" => $this->start_date->format("Y-m-d"),
            "endRecur" => $this->end_date? $this->end_date->format("Y-m-d") : null,
            "startTime" => $this->start_time,
            "endTime" => $this->end_time,
            "daysOfWeek" => [$this->day_of_week]
        ];
    }
}
