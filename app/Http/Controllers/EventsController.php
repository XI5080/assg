<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    //
    function viewEventDetails($eventsId)
    {
        return view('eventDetails', [
            'events' => Event::find($eventsId),
        ]);
    }
}
