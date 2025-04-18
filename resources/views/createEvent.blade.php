@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create a New Event</h1>

    <form action="/admin/event/create" method="POST">
        @csrf

        {{-- Event Name --}}
        <div class="mb-3">
            <label for="eventName" class="form-label">Event Name</label>
            <input id="eventName" name="eventName" type="text" class="form-control" value="{{ old('eventName') }}">
            @error('eventName')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Duration --}}
        <div class="mb-3">
            <label for="duration" class="form-label">Event Duration (minutes)</label>
            <input id="duration" name="duration" type="number" class="form-control" value="{{ old('duration') }}">
            @error('duration')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea id="description" name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- eventType --}}
        <div class="mb-3">
            <label for="eventType" class="form-label">Event Type</label>
            <input id="eventType" name="eventType" type="text" class="form-control" value="{{ old('eventType') }}">
            @error('eventType')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Venue --}}
        <div class="mb-3">
            <label for="venues_id" class="form-label">Select Venue</label>
            <select name="venues_id" id="venues_id" class="form-select">
                @foreach ($venues as $venue)
                <option value="{{ $venue->id }}" {{ old('venues_id') == $venue->id ? 'selected' : '' }}>
                    {{ $venue->location }}
                </option>
                @endforeach
            </select>
            @error('venues_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection