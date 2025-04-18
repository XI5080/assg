@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Ticket Details</h2>

    <div class="card mb-4">
        <div class="card-header">
            <strong>{{ $tickets->event->eventName }}</strong>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Date:</strong> {{ $tickets["date"] }}</li>
                <li class="list-group-item"><strong>Time:</strong> {{ $tickets["time"]}}</li>
                <li class="list-group-item"><strong>Pax:</strong> {{ $tickets["pax"] }}</li>
                <li class="list-group-item"><strong>Location:</strong> {{ $tickets->venue->location }}</li>
            </ul>
        </div>
    </div>

    @cannot('overdue', $tickets)
        <div class="d-flex gap-3">
            <a href="/ticket/edit/{{ $tickets->id }}" class="btn btn-primary">Edit</a>
            <a href="/ticket/cancel/{{ $tickets->id }}" class="btn btn-danger">Cancel</a>
        </div>
    @endcannot
</div>
@endsection
