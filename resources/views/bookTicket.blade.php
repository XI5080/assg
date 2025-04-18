@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Book tickets for {{ $events["eventName"] }}</h1>

    <form action="/book/{{ $events['id'] }}" method="POST">
        @csrf

        {{-- Display Default Date & Time --}}
        <div class="mb-3">
            <label class="form-label">
                <p><strong>Date:</strong> {{ $date}}</p>
                <p><strong>Time:</strong> {{ $time }}</p>
            </label>
        </div>

        <!-- pass the date and time to the controller -->
        
        {{-- Hidden inputs for date and time --}} 
        <input type="hidden" name="date" value="{{ $date }}">
        <input type="hidden" name="time" value="{{ $time }}">


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