@extends('logsign_layout')
@section('content')
                <form action='/login' method='post' class="login">
                    @csrf
                    <h1>Sign In</h1>
                    <div class="login__field">
                        <i class="login__icon fa fa-at"></i>
                        <input type="email" class="login__input" placeholder="Email" name="email" value='{{old('email')}}' required>
                    </div>
                    @error('email')
                    <i class='error'>{{$message}}</i>
                    @enderror
                    <div class="login__field">
                        <i class="login__icon fa fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password" required>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <button class='signup' onclick='location.replace("/signup")'>Sign up</button>
                </div>
@endsection
