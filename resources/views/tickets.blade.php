@extends('main')

@section('content')

<div class="main-content">
    <div class="top-section">Tickets</div>
    @foreach ($data as $d)

    <div class="theatre-box">
        <p>Ticket id : {{$d->ticket_id}}</p>
        <p>Buyer id : {{$member_id}}</p>
        <p>Movie : {{$d->movie_name}}</p>
        <p>Theatre : {{$d->theatre_name}}</p>
        <p>Movie time : {{$d->movie_time}}</p>
    </div>
    @endforeach
</div>

@endsection
