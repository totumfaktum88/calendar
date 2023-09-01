<?php

namespace App\Models\Customer;

use Database\Factories\Customer\EventFactory;
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
        "start" => "datetime",
        "end" => "datetime",
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return EventFactory::new();
    }

    public function getFullNameAttribute() {
        return $this->attributes["first_name"]." ".$this->attributes["last_name"];
    }
}
