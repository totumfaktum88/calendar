<?php

namespace Database\Seeders;

use App\Models\Customer\BackgroundEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackgroundEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        - 2023-09-08-án 8-10 óra
        BackgroundEvent::create([
            "start_date" => "2023-09-08",
            "end_date" => "2023-09-08",
            "start_time" => "08:00",
            "end_time" => "10:00",
        ]);

//        - 2023-01-01-től minden páros héten hétfőn 10-12 óra
        BackgroundEvent::create([
            "start_date" => "2023-01-01",
            "start_time" => "10:00",
            "end_time" => "12:00",
            "day_of_week" => 1
        ]);

//        - 2023-01-01-től minden páratlan héten szerda 12-16 óra
        BackgroundEvent::create([
            "start_date" => "2023-01-01",
            "start_time" => "12:00",
            "end_time" => "16:00",
            "day_of_week" => 3
        ]);

//        - 2023-01-01-től minden héten pénteken 10-16 óra
        BackgroundEvent::create([
            "start_date" => "2023-01-01",
            "start_time" => "10:00",
            "end_time" => "16:00",
            "day_of_week" => 5
        ]);

//        - 2023-06-01-től 2023-11-30-ig minden héten csütörtökön 16-20 óra
        BackgroundEvent::create([
            "start_date" => "2023-06-01",
            "end_date" => "2023-11-30",
            "start_time" => "16:00",
            "end_time" => "20:00",
            "day_of_week" => 4
        ]);
    }
}
