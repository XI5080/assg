@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $user->name }}'s Profile</h2>

    <div class="mb-3 d-flex gap-3">
        <a href="/profile/update/password" class="btn btn-outline-primary">Update Password</a>
        <a href="/profile/deactivate" class="btn btn-outline-danger">Deactivate Account</a>
    </div>

    <h4 class="mb-4">Booked Tickets</h4>

    @if ($user->tickets->isEmpty())
        <p class="text-muted">No tickets booked yet.</p>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($user->tickets as $ticket)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/ticket/view/{{ $ticket->id }}" class="text-decoration-none">
                                    {{ $ticket->event->eventName}}
                                </a>
                            </h5>

                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item"><strong>Date:</strong> {{ $ticket->date }}</li>
                                <li class="list-group-item"><strong>Time:</strong> {{ $ticket->time }}</li>
                                <li class="list-group-item"><strong>Pax:</strong> {{ $ticket->pax }}</li>
                                <li class="list-group-item"><strong>Venue:</strong> {{ $ticket->venue->location }}</li>
                            </ul>

                            @if ($ticket->overdue())
                                <span class="text-muted">This ticket is overdue.</span>
                            @else
                                <a href="/ticket/edit/{{ $ticket->id }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                                <a href="/ticket/cancel/{{ $ticket->id }}" class="btn btn-sm btn-outline-danger">Cancel</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
