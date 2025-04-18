@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Event Listing</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($events as $event)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ url('events/'.$event->id) }}">
                                        {{ $event->eventName }}
                                    </a>
                                </h5>
                                <p class="card-text"><strong>Duration:</strong> {{ $event->duration }} minutes</p>
                                <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
                                <p class="card-text"><strong>Event Type:</strong> {{ $event->eventType }}</p>
                            </div>
                        </div>
                    @endforeach

                    @if($events->isEmpty())
                        <p>No events available.</p>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
