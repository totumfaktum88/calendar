<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarRequest;
use App\Http\Resources\Customer\BackgroundEventResource;
use App\Http\Resources\Customer\EventResource;
use App\Models\Customer\BackgroundEvent;
use App\Models\Customer\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index(Request $request) {

        if ($request->header("X-Resource-List")) {
            return EventResource::collection(Event::query()->get())
                ->additional([
                    "background_events" => BackgroundEventResource::collection(
                        BackgroundEvent::query()->get()
                    )->resolve($request)
                ]);
        }else {
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

    public function store(CalendarRequest $request) {
        $event = Event::create($request->validated());

        return new EventResource($event);
    }
}
