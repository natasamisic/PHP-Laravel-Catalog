<header>
    <h1>Welcome to the Product Catalog</h1>
    <div>
        <a href="/" class="{{Request::is('/') ? 'active' : ''}}">Home</a>
        @auth
            <a href="/add-product" class="{{Request::is('add-product') ? 'active' : ''}}">Add New Product</a>
            <a href="/show-comments-to-approve" class="{{Request::is('show-comments-to-approve') ? 'active' : ''}}">Approve Comments</a>
            <a href="/logout">Logout</a>
        @else
            <a href="/loginPage" class="{{Request::is('loginPage') ? 'active' : ''}}">Login</a>
            <a href="/registerPage" class="{{Request::is('registerPage') ? 'active' : ''}}">Register</a>
        @endauth
    </div> 
</header>
