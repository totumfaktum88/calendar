<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "customer_events";

    protected $fillable = [
        "first_name",
        "last_name",
        "start",
        "end",
    ];
    protected $casts = [
        "start" => "date",
        "end" => "date",
    ];

    public function getFullNameAttribute() {
        return $this->attributes["first_name"]." ".$this->attributes["first_name"];
    }
}
