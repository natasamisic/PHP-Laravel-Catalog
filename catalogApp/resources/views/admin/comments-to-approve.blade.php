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
        <section class="comments">
            <h3>Comments</h3>
            @if($comments->isEmpty())
                <div class="comment">
                    <p style="text-align: center; margin:0px">No comments to approve.</p>
                </div>
            @else
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
            @endif

            @if(session('approve-error'))
                <div class="error-message">
                    {{ session('approve-error') }}
                </div>
            @endif
            @if(session('approve-success'))
                <div class="success-message">
                    {{ session('approve-success') }}
                </div>
            @endif
        </section>
    </main>
</body>
</html>
