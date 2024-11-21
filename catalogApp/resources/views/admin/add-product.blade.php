<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>
<body>

    @include('layouts.header')
    
    <main>
        <section class="form">
            <h2>Create New Product</h2>
            <form id="productForm" action="/create-product" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Product Title:</label>
                    <input type="text" id="title" name="title" minlength="3" maxlength="50" value="{{ old('title') }}" placeholder="Enter product title" required>
                </div>
                <div class="form-group">
                    <label for="description">Short Description:</label>
                    <textarea id="description" name="short_description" minlength="10" maxlength="255" rows="3" value="{{ old('short_description') }}" placeholder="Enter a short description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image URL:</label>
                    <input type="text" id="image" name="image" maxlength="500" value="{{ old('image') }}" placeholder="Enter product image URL" required>
                </div>
                <button type="submit" class="green-button">Create Product</button>
            </form>

            @if(session('product-error'))
            <div class="error-message">
                {{ session('product-error') }}
            </div>
            @endif
            @if(session('product-success'))
                <div class="success-message">
                    {{ session('product-success') }}
                </div>
            @endif
        </section>
    </main>
</body>
</html>
