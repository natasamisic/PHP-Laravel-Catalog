<header>
    <h1>Welcome to the Product Catalog</h1>
    <div>
        @auth
            @if (Request::is('add-product'))
                <a href="/" class="link">Home</a>
                <a href="/show-comments-to-approve" class="link">Approve Comments</a>
            @elseif (Request::is('show-comments-to-approve'))
                <a href="/" class="link">Home</a>
                <a href="/add-product" class="link">Add New Product</a>
            @else
                <a href="/" class="link">Home</a>
                <a href="/add-product" class="link">Add New Product</a>
                <a href="/show-comments-to-approve" class="link">Approve Comments</a>
            @endif
            <a href="/logout" class="link">Logout</a>
        @else
            <a href="/loginPage" class="link">Login</a>
            <a href="/registerPage" class="link">Register</a>
        @endauth
    </div> 
</header>
