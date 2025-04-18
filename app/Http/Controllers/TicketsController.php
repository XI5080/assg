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

        // Generate random date (within next 30 days for example)
        $randomDays = rand(1, 30);
        $date = now()->addDays($randomDays)->format('Y-m-d');

        // Generate random time (on the hour or half-hour between 9am-9pm)
        $hour = rand(9, 20); // 9am to 8pm
        $minute = (rand(0, 1) == 0) ? '00' : '30';
        $time = "$hour:$minute:00";

        $venuesId = array();
        foreach (DB::select("SELECT venues_id FROM events_venues WHERE events_id = $eventsId") as $venues) {
            array_push($venuesId, $venues->venues_id);
        }
        return view('bookTicket', [
            'events' => Event::find($eventsId),
            'venues' => Venue::find($venuesId),
            'date' => $date, // Pass the generated date
        'time' => $time,
        ]);
    }

    function bookTicket(Request $req, $eventsId)
    {
        $date = $req->input('date');
        $time = $req->input('time');

        $req['pax'] = $req['pax'] ?? 1;

        $venuesId = array();
        foreach (DB::select("SELECT venues_id FROM events_venues WHERE events_id = $eventsId") as $venues) {
            array_push($venuesId, $venues->venues_id);
        }

        $req->validate([
            'venues' => ['required', 'numeric', Rule::in($venuesId)],
            'pax' => [
                'required',
                'numeric',
                'min:1',
                Rule::unique('tickets')->where(function ($query) use ($date, $time, $eventsId, $req) {
                    return $query->where('events_id', $eventsId)
                        ->where('date', $date)
                        ->where('time', $time)
                        ->where('venues_id', $req["venues"]);
                })
            ],
        ]);

        Ticket::create([
            'name' => Auth::user()["name"],
            'events_id' => $eventsId,
            'date' => $date,
            'time' => $time,
            'pax' => $req["pax"],
            'venues_id' => $req["venues"]
        ]);

        return redirect("/")->with('success', 'Ticket created successfully.');
    }
}
