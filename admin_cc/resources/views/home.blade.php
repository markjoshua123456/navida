<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        
    </div>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="categories_id">Category ID:</label>
        <input type="text" name="categories_id" required>
        <br>

        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>
        <br>

        <label for="product_stocks">Product Stocks:</label>
        <input type="number" name="product_stocks" required>
        <br>

        <label for="product_status">Product Status:</label>
        <input type="text" name="product_status" required>
        <br>

        <label for="product_desc">Product Description:</label>
        <textarea name="product_desc" required></textarea>
        <br>

        <label for="product_price">Product Price:</label>
        <input type="text" name="product_price" required>
        <br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
