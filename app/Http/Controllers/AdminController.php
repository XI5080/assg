<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Venue;

class AdminController extends Controller
{
    //
    function viewAdminDashboard()
    {
        return view('AdminDashboard',
        [
            'venues' => Venue::all(),
            'events' => Event::all(),
        ]);
    }

    function viewCreateEventsPage()
    {
        return view("createEvent",
        [
            'venues' => Venue::all(),        
        ]);
    }

    function createEvents(Request $req)
    {
        $req->validate([
            'eventName' => ['required','max:50'],
            'duration' => ['required','numeric'],
            'description' => ['required'],
            'eventType' => ['required','max:30'],
            'venues_id' => ['required','exists:venues,id']
        ]);
        
        $newEvent = Event::create([
            'eventName' => $req["eventName"],
            'duration' => $req["duration"],
            'description' => $req["description"],
            'eventType' => $req["eventType"]]);
       
                DB::table('events_venues')->insert([
                    'venues_id' => $req["venues_id"],
                    'events_id' => $newEvent->id
                ]);
            
      
        return redirect("admin")->with('success', 'Event created successfully.');
    }

    function viewEditEventsPage(Request $req, $eventsId){

        $venuesCheck = array();
        foreach (DB::select("SELECT venues_id FROM events_venues WHERE events_id = $eventsId") as $eventsVenues) {
            array_push($venuesCheck, $eventsVenues->venues_id);
        }

        return view("editEvent",
        [
            'events' => Event::find($eventsId),
            'venues' => Venue::withTrashed()->get(),
            'venuesCheck' => $venuesCheck
        ]);
    }

    function editEvents(Request $req, $eventsId)
    {
        $req->validate([
            'eventName' => ['required','max:50'],
            'duration' => ['required','numeric'],
            'description' => ['required'],
            'eventType' => ['required','max:30'],
            'venues_id' => ['required','exists:venues,id']
        ]);

        $events = Event::find($eventsId);
        $events->eventName = $req["eventName"];
        $events->duration = $req["duration"];
        $events->description = $req["description"];
        $events->eventType = $req["eventType"];
        $events->save();     

            DB::table('events_venues')->insert([
                'venues_id' => $req["venues_id"],
                'events_id' => $eventsId
            ]);
        

        return redirect("admin")->with('success', 'Event updated successfully.');
    }

    function deleteEvents(Request $req, $eventsId)
    {
        $events = Event::find($eventsId);
        $events->delete();

        return redirect("admin")->with('success', 'Event deleted successfully.');
    }

    //create venues
    function createVenues(Request $req)
    {
        $req->validate([
            'location' => ['required','max:50'],
        ]);

        Venue::create([
            'location' => $req["location"],
        ]);

        return redirect("admin")->with('success', 'Venue created successfully.');
    }

    function viewEditVenuesPage(Request $req, $venuesId)
    {
        return view("editVenue",
        [
            'venue' => Venue::find($venuesId),
        ]);
    }

    function editVenues(Request $req, $venuesId)
    {
        $req->validate([
            'location' => ['required','max:50'],
        ]);

        $venues = Venue::find($venuesId);
        $venues->location = $req["location"];
        $venues->save();

        return redirect("admin")->with('success', 'Venue updated successfully.');
    }

    function deleteVenues(Request $req, $venuesId)
    {
        $venues = Venue::find($venuesId);
        $venues->delete();

        return redirect("admin")->with('success', 'Venue deleted successfully.');
    }
}
