@extends('main')

@section('search-bar')
<div class="search-section">
    <form action="{{route('home')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search...">
        <button type="submit"><img src="images\search.svg" alt=""></button>
    </form>
</div>
@endsection

@section('content')
@if ($errors->any())
    <p style="color:red; margin-top:10px">
        {{$errors->first()}}
    </p>
@endif
<div class="main-content">
    <img src="images\iklan1.png">
    <div class="grid">
        @foreach ( $movies as $movie )
            <a href="{{ route('movie_detail', ['movie_id' => $movie->movie_id]) }}">
                <div class="playing_movie">
                    <img src="{{Storage::url($movie->movie_url)}}">
                    <p class="movie_title">{{$movie->movie_name}}</p>
                    <div class="bottom_section">
                        <div class="rating">{{$movie->dimension}}</div>
                        <div class="rating">{{$movie->age}}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @if (Auth::check() && Auth::user()->user_role == 'admin')
        <a href="{{route('add_new_movie_page')}}"><div class="add-movie">+</div></a>
    @endif
</div>
<div class="pagination">
    {!! $movies->links() !!}
</div>

@endsection
