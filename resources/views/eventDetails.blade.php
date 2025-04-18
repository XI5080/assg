@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $events["eventName"] }}</h2>

            <div class="mb-3">
                <span class="badge bg-primary">{{ $events["duration"] }} minutes</span>
                <span class="badge bg-secondary">{{ $events["eventType"] }}</span>
            </div>

            <p class="card-text">{{ $events["description"] }}</p>

            <a href="/book/{{ $events['id'] }}" class="btn btn-success">
                Book Event Tickets
            </a>
        </div>
    </div>
</div>
@endsection
