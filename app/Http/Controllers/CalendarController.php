<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index(Request $request) {
        $config = [
            "config" => [
                "page" => [
                    "collection" => [],
                    "datasets" => [
                    ]
                ]
            ]
        ];

        return Inertia::render("CalendarPage", $config);
    }
}
