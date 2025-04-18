@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Ticket</h1>

    <form action="/ticket/edit/{{ $tickets->id }}" method="POST">
        @csrf

        {{-- Event --}}
        <div class="mb-3">
            <label class="form-label">Event</label>
            <input type="text" class="form-control" value="{{ $tickets->event->eventName }}" readonly>
        </div>

        {{-- Date --}}
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="text" class="form-control" value="{{ $tickets->date }}" readonly>
        </div>

        {{-- Time --}}
        <div class="mb-3">
            <label class="form-label">Time</label>
            <input type="text" class="form-control" value="{{ $tickets->time }}" readonly>
        </div>

        {{-- Venue --}}
        <div class="mb-3">
            <label class="form-label">Venue</label>
            <input type="text" class="form-control" value="{{ $tickets->venue->location }}" readonly>
        </div>

        {{-- Pax --}}
        <div class="mb-3">
            <label for="pax" class="form-label">Number of Pax</label>
            <input type="number" name="pax" class="form-control w-25" value="{{ $tickets->pax }}" min="1">
            <div class="text-danger mt-1">
                @error('pax')<div>{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
</div>
@endsection