@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Book tickets for {{ $events["eventName"] }}</h1>

    <form action="/book/{{ $events['id'] }}" method="POST">
        @csrf

        {{-- Date & Time --}}
        <div class="mb-3">
            <label class="form-label">Time</label>
            <div class="d-flex gap-3">
                <input type="date" name="date" class="form-control w-25" value="{{ old('date') }}">
                <input type="time" name="time" step="1800" class="form-control w-25" value="{{ old('time') }}">
            </div>
            <div class="text-danger mt-1">
                @error('date')<div>{{ $message }}</div>@enderror
                @error('time')<div>{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Venue --}}
        <div class="mb-3">
            <label for="venue-display" class="form-label">Venue</label>
            <div id="venue-display" class="form-control w-50" readonly>
                {{ $venues[0]["location"] }}
            </div>

            {{-- Hidden input to actually send venue ID --}}
            <input type="hidden" name="venues" value="{{ $venues[0]["id"] }}">

            <div class="text-danger mt-1">
                @error('venues')<div>{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Pax --}}
        <div class="mb-3">
            <label for="pax" class="form-label">Number of Pax</label>
            <input type="number" name="pax" class="form-control w-25" value="{{ old('pax', 1) }}" min="1">
            <div class="text-danger mt-1">
                @error('pax')<div>{{ $message }}</div>@enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Book Ticket</button>
    </form>
</div>
@endsection