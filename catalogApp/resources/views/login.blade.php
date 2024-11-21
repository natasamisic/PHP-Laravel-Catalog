<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    @include('layouts.header')
    
    <main>
        <!-- Login Form -->
        <section class="form-container">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="name" name="name" value="{{ old('name') }}" placeholder="Your Name" required>
                <input type="password" name="password" placeholder="Your Password" required>
                <button type="submit">Login</button>
            </form>
            {{-- <p>Don't have an account? <a href="/registerPage">Register here</a></p>  --}}
            
            @if(session('login-error'))
            <div class="error-message">
                {{ session('login-error') }}
              </div>
            @endif
        </section>   
    </main>
</body>
</html>
