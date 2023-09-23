@extends('base')

@section('content')
    <div class="w3-container w3-center">
        <h1>Login</h1>
        <form method="post" action="{{ Route('auth') }}" class="login-form">
            @csrf

            <!-- Errors -->
            <div class="error">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror

                @error('remember')
                    <div>{{ $message }}</div>
                @enderror

                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br/>

            <!-- Email -->
            <input id="email" name="email" type="email" placeholder="Email" class="login"/>
            <br/>

            <!-- Password -->
            <input id="password" name="password" type="password" placeholder="Password" class="login"/>
            <br/>

            <!-- Remember checkbox -->
            <label for="remember">Remember:</label>
            <input id="remember" name="remember" type="checkbox"/>
            <br/>

            <!-- Submit button -->
            <button type="Submit" class="login">Submit</button>
        </form>
    </div>
@endsection