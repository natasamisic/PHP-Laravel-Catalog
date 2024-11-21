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
        <!-- Register Form -->
        <section class="form-container">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="name" id="name" name="name" maxlength="255" value="{{ old('name') }}" placeholder="Your Name" required>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                <input type="password" id="password" name="password" minlength="3" placeholder="Your Password" required>
                <button type="submit">Register</button>
            </form>
            
            @if(session('register-error'))
            <div class="error-message">
                {{ session('register-error') }}
              </div>
            @endif
        </section>
    </main>
</body>
</html>
