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
        <h1>Login to Your Account</h1>
        <nav>
            <a href="/" class="login-link">Back to Catalog</a>
        </nav>
    </header>

    <main>
        <!-- Login Form -->
        <section class="form-container">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="name" name="name" placeholder="Your Name" required>
                <input type="password" name="password" placeholder="Your Password" required>
                <button type="submit">Login</button>
            </form>
        </section>
    </main>
</body>
</html>
