<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundEvent extends Model
{
    use HasFactory;

    protected $table = "background_events";

    protected $fillable = [
        "user_id",
        "start",
        "end",
        "weekly",
        "even",
        "odd",
        "expire_at"
    ];
    protected $casts = [
        "start" => "date",
        "end" => "date",
        "odd" => "boolean",
        "even" => "boolean",
        "expire_at" => "date"
    ];
}
