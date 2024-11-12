@extends('main')

@section('content')
<div class="main-content">
    <div class="top-section">Edit Movie Info
    </div>
    <form action="{{ route('edit_movie_info') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <img src="{{Storage::url($movie->movie_url)}}" style="width: 204px;height: 263px;margin-bottom: 10px;"/>
        <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
        <p>Movie Name:</p>
        <input type="text" name="movie_name"  value="{{$movie->movie_name}}">
        <p>Duration:</p>
        <input type="text" name="duration"  value="{{$movie->duration}}">
        <p>Dimension:</p>
        <input type="text" name="dimension"  value="{{$movie->dimension}}">
        <p>Age:</p>
        <input type="text" name="age"  value="{{$movie->age}}">
        <p>Synopsis:</p>
        <textarea type="text" name="synopsis" >{{$movie->synopsis}}</textarea>
        <p>Producer:</p>
        <input type="text" name="producer" value="{{$movie->producer}}">
        <p>Director:</p>
        <input type="text" name="director"  value="{{$movie->director}}">
        <p>Writer:</p>
        <input type="text" name="writer"  value="{{$movie->writer}}">
        <p>Cast:</p>
        <input type="text" name="casts"  value="{{$movie->casts}}">
        <button type="submit" class="button-submit">Edit</button>
    </form>
    <form action="{{ route('delete_relationship_by_movie') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
        <button type="submit" class="button-submit">Delete</button>
    </form>
    @if ($errors->any())
        <p style="color:red; font-size:14px; margin-top:10px">
            {{$errors->first()}}
        </p>
    @endif
</div>
@endsection
