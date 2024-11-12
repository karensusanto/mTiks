@extends('main')

@section('search-bar')
<div class="search-section">
    <form action="{{route('theatres')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search...">
        <button type="submit"><img src="images\search.svg" alt=""></button>
    </form>
</div>
@endsection

@section('content')
<div class="main-content">

    @if (Auth::check() && Auth::user()->user_role == 'admin')
        @foreach ($theatres as $t)
        <a href="{{route('edit_theatre_info_page',['theatre_id'=>$t->theatre_id])}}" class="theatre-list"><div class="theatre-box">{{$t->theatre_name}}</div></a>
        @endforeach

        <div class="bottom">
            <a href="{{route('add_theatre_page')}}"><div class="add-theatre">+</div></a>
        </div>

    @else
        @foreach ($theatres as $t)
        <div class="theatre-box">{{$t->theatre_name}}</div>
        @endforeach
    @endif
    <div class="pagination">
        {!! $theatres->links() !!}
    </div>
</div>

@endsection
