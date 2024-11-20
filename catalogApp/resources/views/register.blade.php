<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header>
        <h1>Make A New Account</h1>
        <nav>
            <a href="/" class="login-link">Back to Catalog</a>
        </nav>
    </header>

    <main>
        <!-- Register Form -->
        <section class="form-container">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="name" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="password" name="password" placeholder="Your Password" required>
                <button type="submit">Register</button>
            </form>
        </section>
    </main>
</body>
</html>
