@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Event</h1>

    <form action="{{ url('/admin/event/edit/' . $events->id) }}" method="POST">
        @csrf

        {{-- Evebnt Name --}}
        <div class="mb-3">
            <label for="eventName">Event Name</label>
            <textarea name="eventName" id="eventName" class="form-control">{{ old('eventName', $events->eventName) }}</textarea>
            @error('eventName')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Duration --}}
        <div class="mb-3">
            <label for="duration">Duration (minutes)</label>
            <input id="duration" name="duration" type="number" class="form-control" value="{{ old('duration', $events->duration) }}">
            @error('duration')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" class="form-control">{{ old('description', $events->description) }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Event Type --}}
        <div class="mb-3">
            <label for="eventType">Event Type</label>
            <textarea name="eventType" id="eventType" class="form-control">{{ old('eventType', $events->eventType) }}</textarea>
            @error('eventType')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Venues --}}
<div class="mb-3">
    <label for="venues_id" class="form-label">Available Venue</label>
    <select name="venues_id" id="venues_id" class="form-select">
        <option value="">-- Choose a venue --</option>
        @foreach ($venues as $venue)
            <option value="{{ $venue->id }}"
                {{ old('venues_id', isset($venuesCheck[0]) ? $venuesCheck[0] : '') == $venue->id ? 'selected' : '' }}>
                {{ $venue->location }}
            </option>
        @endforeach
    </select>
    @error('venue_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
