@extends('main')

@section('content')
<div class="main-content">
    <div class="top-section">New Theatre
    </div>
    <form action="{{ route('add_theatre') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Theatre Name:</p>
        <input type="text" name="theatre_name"  value="">
        <button type="submit" class="button-submit">Create Theatre</button>
    </form>
    @if ($errors->any())
        <p style="color:red; font-size:14px; margin-top:10px">
            {{$errors->first()}}
        </p>
    @endif
</div>
@endsection
