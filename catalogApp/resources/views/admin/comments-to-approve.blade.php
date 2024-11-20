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
        <section class="comments">
            <h3>Comments</h3>
            @foreach ($comments as $comment)
                <div class="comment">
                    <strong>{{ $comment->name }}</strong> ({{ $comment->email }}):
                    <p>{{ $comment->text }}</p>
                    <form action="/approve-comment/{{ $comment->idcomment }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="green-button">Approve</button>
                    </form>
                </div>
            @endforeach
        </section>

        @if(session('approve-success'))
            <script>
                alert('{{ session('approve-success') }}');
            </script>
        @endif
    </main>
</body>
</html>
