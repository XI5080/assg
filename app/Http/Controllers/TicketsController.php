<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    //
    function viewBookTicketPage($eventsId)
    {
        $venuesId = array();
        foreach (DB::select("SELECT venues_id FROM events_venues WHERE events_id = $eventsId") as $venues) {
            array_push($venuesId, $venues->venues_id);
        }
        return view('bookTicket', [
            'events' => Event::find($eventsId),
            'venues' => Venue::find($venuesId),
        ]);
    }

    function bookTicket(Request $req, $eventsId)
    {

        $req["time"] = $req["time"] . ":00";
        $req['pax'] = $req['pax'] ?? 1;

        $venuesId = array();
        foreach (DB::select("SELECT venues_id FROM events_venues WHERE events_id = $eventsId") as $venues) {
            array_push($venuesId, $venues->venues_id);
        }
        $req->validate([
            'date' => ['required', 'date', "after_or_equal:today"],
            'time' => ['required', 'regex:/^([01]\d|2[0-3]):(00|30):00$/'],
            'venues' => ['required','numeric',Rule::in($venuesId)], 
            'pax' => ['required', 'numeric', 'min:1',
                        Rule::unique('tickets')->where(function ($query) use ($req, $eventsId) {
                        return $query->where('events_id', $eventsId)
                        ->where('date', $req["date"])
                        ->where('time', $req["time"])
                        ->where('venues_id', $req["venues"]);
            })],

        ]);


        Ticket::create([
            'name' => Auth::user()["name"],
            'events_id' => $eventsId,
            'date' => $req["date"],
            'time' => $req["time"],
            'pax' => $req["pax"],
            'venues_id' => $req["venues"]
        ]);

        return redirect("/")->with('success', 'Ticket created successfully.');
    }
}
