@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            {{-- Events Section --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Admin Dashboard</span>
                    <a href="{{ url('/admin/event/create') }}" class="btn btn-sm btn-primary">Creat New Event</a>
                </div>

                <div class="card-body">
                    @forelse ($events as $event)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->eventName }}</h5>
                                <p class="card-text"><strong>Duration:</strong> {{ $event->duration }} minutes</p>
                                <p class="card-text"><strong>Description:</strong> {{ $event-> description }}</p>
                                <p class="card-text"><strong>EventType:</strong> {{ $event->eventType }}</p>
                                <div>
                                    <a href="{{ url('/admin/event/edit/'.$event->id) }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                                    <a href="{{ url('/admin/event/delete/'.$event->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No movies available.</p>
                    @endforelse
                </div>
            </div>

           

        </div>
    </div>
</div>
@endsection
