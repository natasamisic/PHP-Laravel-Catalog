<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to the Product Catalog</h1>
        <div>
            @auth
                <a href="/logout" class="link">Logout</a>
            @else
                <a href="/loginPage" class="link">Login</a>
                <a href="/registerPage" class="link">Register</a>
            @endauth
        </div>
        
        
    </header>

    <main>
        @auth
            <div>
                <button onclick="window.location.href='/add-product';" class="green-button" style="margin: 10px;">Add New Product</button>
            </div>
        @endauth

        <!-- Product Grid -->
        <section class="grid">
             @foreach ($products as $product)
                <div class="product">
                    <img src="{{ $product->image }}" alt="{{ $product->title }}">
                    <h2>{{ $product->title }}</h2>
                    <p>{{ $product->short_description }}</p>
                </div>
            @endforeach 
        </section>

        <!-- Comments Section -->
        <section class="comments">
            <h3>Comments</h3>
            
        </section>

        <!-- Comment Form -->
        <section class="form">
            <h3>Leave a Comment</h3>
            <form action="/submitComment" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="text" rows="4" placeholder="Your Comment" required></textarea>
                <button class="green-button">Submit</button>
            </form>
        </section>
        @if(session('comment-success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif
    </main>
</body>
</html>
