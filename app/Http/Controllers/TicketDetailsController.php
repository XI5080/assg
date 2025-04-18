<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\User;

class TicketDetailsController extends Controller
{
    //
    function viewTicketDetailsPage(Request $req, $ticketsId)
    {
        if ($req->user()->cannot("actionOnTicket",Ticket::find($ticketsId)
        )) {
            return redirect("/noaccess")->withErrors(["error" => "You are not authorized to view this ticket"]);
        }

        return view("ticketDetails", [
            'tickets' => Ticket::find($ticketsId),
        ]);
    }

    function viewEditTicketPage(Request $req, $ticketsId)
    {
        if ($req->user()->cannot("actionOnTicket",Ticket::find($ticketsId)) || Ticket::find($ticketsId)->overdue()) {
            return redirect("/noaccess")->withErrors(["error" => "You are not authorized to view this ticket"]);
        }

        return view("editTicket", [
            'tickets' => Ticket::find($ticketsId),
        ]);
    }

    function editTicket(Request $req, $ticketsId)
    {
        if ($req->user()->cannot("actionOnTicket",Ticket::find($ticketsId)) || Ticket::find($ticketsId)->overdue()) {
            return redirect("/noaccess")->withErrors(["error" => "You are not authorized to view this ticket"]);
        }
        $req["time"] = $req["time"] . ":00";
        $req['pax'] = $req['pax'] ?? 1;
        $ticket = Ticket::find($ticketsId);
        $req->validate([
            'pax' => [
                'required',
                'numeric',
                'min:1',
                // Keep pax validation but remove date/time checks
                Rule::unique('tickets')->where(function ($query) use ($ticket) {
                    return $query->where('events_id', $ticket["events_id"])
                        ->where('date', $ticket["date"])
                        ->where('time', $ticket["time"])
                        ->where('venues_id', $ticket["venues_id"]);
                })
            ],
        ]);
    
        // Only allow pax changes
        $ticket["pax"] = $req["pax"];
        $ticket->save();
        
        return redirect("/profile")->with('success', 'Ticket updated successfully.');
    }

    function cancelTicket(Request $req, $ticketsId)
    {
        if ($req->user()->cannot("actionOnTicket",Ticket::find($ticketsId)) || Ticket::find($ticketsId)->overdue()) {
            return redirect("/noaccess")->withErrors(["error" => "You are not authorized to view this ticket"]);
        }

        Ticket::find($ticketsId)->delete();
        return redirect("/profile")->with('success', 'Ticket cancelled successfully.');
    }
}
