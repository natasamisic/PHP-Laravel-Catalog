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
    </header>

    <main>
        <!-- Product Grid -->
        <section class="grid">
            <div class="product">
                <img src="data:image/jpeg;base64,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" alt="">
                <h2>Product</h2>
                <p>description</p>
            </div>
        </section>

        <!-- Comments Section -->
        <section class="comments">
            <h3>Comments</h3>
            
        </section>

        <!-- Comment Form -->
        <section class="form">
            <h3>Leave a Comment</h3>
            
            <form action="" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="text" rows="4" placeholder="Your Comment" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
</body>
</html>