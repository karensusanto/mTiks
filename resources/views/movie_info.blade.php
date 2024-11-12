@extends('main')

@section('content')
<div class="main-content">
    <div class="top-section">
        <div class="age">{{$movie->age}}</div>
        <div class="title">{{$movie->movie_name}}</div>
    </div>
    <div class="middle-section">
        <img src="{{Storage::url($movie->movie_url)}}">
        <div class="side-info">

            <div class="duration">{{$movie->duration}} Minutes</div>
            <div class="dimension">{{$movie->dimension}}</div>
            @if (Auth::check()&&Auth::user()->user_role=='admin')
                <a href="{{route('edit_movie_info_page',['movie_id' => $movie->movie_id])}}" class="button-submit">Edit</a>
            @elseif(Auth::check()&&Auth::user()->user_role=='member')
                <form action="{{route('buy_ticket',['movie_id' => $movie->movie_id, 'user_id' => Auth::user()->users_id])}}" method="POST" >@csrf<button type="submit" class="buy-ticket" >BUY TICKET</button></form>
            @else
            <a href="{{route('login_page')}}" class="buy-ticket">BUY TICKET</a>
            @endif
        </div>
    </div>
    <div class="synopsis">{{$movie->synopsis}}</div>
    <div class="judul-isi">
        <div class="judul">Producer</div>
        <p>{{$movie->producer}}</p>
    </div>
    <div class="judul-isi">
        <div class="judul">Director</div>
        <p>{{$movie->director}}</p>
    </div>
    <div class="judul-isi">
        <div class="judul">Writer</div>
        <p>{{$movie->writer}}</p>
    </div>
    <div class="judul-isi">
        <div class="judul">Cast</div>
        <p>{{$movie->casts}}</p>
    </div>
</div>
@endsection
