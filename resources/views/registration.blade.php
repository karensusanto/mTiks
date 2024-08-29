@extends('main')

@section('content')
<div class="main-content">
    <div class="top-section">
        <div class="reg-title">M-Tiks Registration</div>
    </div>
    <div class="register-top-container">
        <form action="{{route('register')}}" method="POST" class="register-form" enctype="multipart/form-data">
            @csrf
            <p>Full Name as per your ID :</p>
            <input type="text" name="users_name" value="" placeholder="Your Name" class="register-input">
            <p>Email:</p>
            <input type="email" name="email" value="" placeholder="Your Valid Email" class="login-input">
            <p>Handphone:</p>
            <input type="tel" name="phone_number" placeholder="Handphone Number" pattern="[0-9]{12,14}" class="register-input">
            <p>PIN/Password:</p>
            <input type="password" name="pin" placeholder="6 digits Number" class="register-input">
            <p>Re-type PIN/Password:</p>
            <input type="password" name="retype_pin" placeholder="6 digits Number" class="register-input">
            <span class="login-checkbox-container">
                <input type="checkbox" name="terms" class="login-checkbox">
                <p>I agree with terms and condition</p>
            </span>
            <button type="submit" class="button-submit">Register Account</button>
        </form>
        @if ($errors->any())
                <p style="color:red; font-size:14px; margin-top:10px">
                    {{$errors->first()}}
                </p>
        @endif
    </div>
</div>
@endsection
