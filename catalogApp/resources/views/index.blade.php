<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    @include('layouts.header')

    <main>
        <!-- Product Grid -->
        <section class="grid">
             @foreach ($products as $product)
                <div class="product">
                    <img src="{{ $product->image }}" alt="{{ $product->title }}">
                    <h2>{{ $product->title }}</h2>
                    <p>{{ $product->short_description }}</p>
                    @auth
                    <button class="delete-button" onclick="document.getElementById('modal-{{ $product->idproduct }}').style.display='flex'">
                        Delete product
                    </button>
                    <!-- Delete Product Modal -->
                    <div id="modal-{{ $product->idproduct }}" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">Confirm Deletion</div>
                            <div class="modal-body">Are you sure you want to delete this product?</div>
                            <div class="modal-buttons">
                                <!-- Delete form -->
                                <form action="/delete-product/{{ $product->idproduct }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="confirm-button">Yes</button>
                                </form>
                                <!-- Cancel button -->
                                <button type="button" class="cancel-button" onclick="document.getElementById('modal-{{ $product->idproduct }}').style.display='none'">
                                    No
                                </button>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            @endforeach 
        </section>

        <div class="pagination">
            {{ $products->links('vendor.pagination.simple-default') }}
        </div>

        @auth
        <!-- Comments Section For Admin-->
        <section class="comments">
            <h3>Comments</h3>
            @foreach ($comments as $comment)
                <div class="comment">
                    <strong>{{ $comment->name }}</strong> ({{ $comment->email }}):
                    <p>{{ $comment->text }}</p>
                </div>
            @endforeach
        </section>
        
        @else
        <!-- Comments Section For User-->
        <section class="comments">
            <h3>Comments</h3>
            @foreach ($comments as $comment)
                <div class="comment">
                    <strong>{{ $comment->name }}</strong>:
                    <p>{{ $comment->text }}</p>
                </div>
            @endforeach
        </section>

        <!-- Comment Form -->
        <section class="form">
            <h3>Leave a Comment</h3>
            <form action="/submit-comment" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="text" rows="4" placeholder="Your Comment" required></textarea>
                <button class="green-button">Submit</button>
            </form>
        </section>
        @endauth
        
        @if(session('comment-success'))
            <script>
                alert('{{ session('comment-success') }}');
            </script>
        @endif
    </main>
</body>
</html>
