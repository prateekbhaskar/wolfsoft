@extends('logsign_layout')
@section('content')
                <form action='/user' method='post' class="login" style='padding-top:0px' enctype="multipart/form-data">
                    @csrf
                    <h1>Sign Up</h1>
                    <div class="signup_field">
                        <i class="login__icon fa fa-user"></i>
                        <input type="text" class="login__input" placeholder="First Name" name="first_name" value='{{old('first_name')}}' required>
                    </div>
                    @error('first_name')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <div class="signup_field">
                        <i class="login__icon fa fa-user"></i>
                        <input type="text" class="login__input" placeholder="Last Name" name="last_name" value='{{old('last_name')}}' required>
                    </div>
                    @error('last_name')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <div class="signup_field">
                        <i class="login__icon fa fa-at"></i>
                        <input type="email" class="login__input" placeholder="Email" name="email" value='{{old('email')}}' required>
                    </div>
                    @error('email')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <div class="signup_field">
                        <i class="login__icon fa fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password" required>
                        <input type="password" class="login__input" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                    @error('password')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    @error('password_confirm')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <div class="signup_field">
                        <i class="login__icon fa fa-lock"></i>
                        <select class='login_input gender_select' name='gender' required>
                            <option value=''>Select Gender</option>
                            <option value='male' @if (old('gender') == "male") {{ 'selected' }} @endif>Male</option>
                            <option value='female' @if (old('gender') == "female") {{ 'selected' }} @endif>Female</option>
                            <option value='other' @if (old('gender') == "other") {{ 'selected' }} @endif>Other</option>
                        </select>
                    </div>
                    @error('gender')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <div class="signup_field">
                        <i class="login__icon fa fa-file-image"></i>
                        <input type="file" class="login__input" name="photo">
                    </div>
                    @error('photo')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <button class="button login__submit" style='margin-top:0px;width:70%'>
                        <span class="button__text">SIGN UP</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login" style='height:auto;width:auto'>
                    <button class='signup' onclick='location.replace("/")'>Login</button>
                </div>
@endsection
