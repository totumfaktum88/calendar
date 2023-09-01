<?php

namespace App\Models\Customer;

use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundEvent extends Model
{
    use HasFactory;

    protected $table = "background_events";

    protected $fillable = [
        "start_date",
        "end_date",
        "start_time",
        "end_time",
        "day_of_week",
    ];
    protected $casts = [
        "start_date" => "date",
        "end_date" => "date",
        "start_time" => TimeCast::class,
        "end_time" => TimeCast::class,
    ];
}
