@extends('main')

@section('content')
<div class="main-content">
    <div class="top-section">Edit Theatre Info
    </div>
    <form action="{{ route('edit_theatre_info') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <p>Theatre Name:</p>
        <input type="hidden" name="theatre_id" value="{{$theatre->theatre_id}}">
        <input type="text" name="theatre_name"  value="{{$theatre->theatre_name}}">
        <button type="submit" class="button-submit">Edit</button>
    </form>
    <form action="{{ route('delete_relationship_by_theatre') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="theatre_id" value="{{$theatre->theatre_id}}">
        <button type="submit" class="button-submit">Delete</button>
    </form>
    @if ($errors->any())
        <p style="color:red; font-size:14px; margin-top:10px">
            {{$errors->first()}}
        </p>
    @endif
</div>
@endsection
