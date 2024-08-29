@extends('main')

@section('content')
<div class="main-content">
    <img src="images\logo.png">
        <form action="{{route('login')}}" method="POST" class="login-form" enctype="multipart/form-data">
            @csrf
            <input type="text" name="user_email" value="" placeholder="Email">
            <input type="password" name="password" placeholder="PIN/Password">
            <button type="submit" class="button-submit">Log In</button>
        </form>
        @if ($errors->any())
                <p style="color:red; font-size:14px; margin-top:10px">
                    {{$errors->first()}}
                </p>
        @endif
    <hr>
        <p class="login-signup-text"><span>New Member, </span> <a href="{{ route('register_page') }}" style="color:black; text-decoration:none">Register M-Tix</a></p>

</div>
@endsection
