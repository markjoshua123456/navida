<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    @vite(['resources/css/list/list.css'])

</head>
<body>
    @include('navbar.navbar')

    <h1>Stocks</h1>

    <form class="search-form" action="#" method="GET">
                <input id="" name="" class="search-input" placeholder="Search the item name or code" type="search" autofocus>
                <button type="submit" class="search-button">Search</button>
            </form>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Item Code</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Stocks</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->item_code }}</td>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_stocks }}</td>
                        <td>{{ $product->product_status }}</td>
                        <td>{{ $product->product_desc }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>
                            @if ($product->product_image)
                                <img src="{{ asset($product->product_image) }}" alt="Product Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <button type="button" class="edit-button" onclick="openModal({{ $product->products_id }}, '{{ $product->item_code }}', '{{ $product->product_name }}', {{ $product->categories_id }}, {{ $product->product_stocks }}, '{{ $product->product_status }}', '{{ $product->product_desc }}', {{ $product->product_price }})">
                                <img src="{{ asset('images/edit.png') }}" alt="Edit" style="width: 20px; height: 20px;">
                            </button>

                            <form action="{{ route('products.destroy', $product->products_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this product?');">
                                    <img src="{{ asset('images/delete.png') }}" alt="Delete" style="width: 20px; height: 20px;">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Stocks</h2>
            <form id="editForm" action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="productId" name="products_id">
                <input type="hidden" id="categories_id" name="categories_id">


                <label for="item_code">Item Code:</label>
                <input type="text" id="item_code" name="item_code" required>

                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>

                <label for="product_stocks">Quantity:</label>
                <input type="number" id="product_stocks" name="product_stocks" required>

                <label for="product_desc">Description:</label>
                <input type="text" id="product_desc" name="product_desc" required>

                <label for="product_price">Price:</label>
                <input type="number" id="product_price" name="product_price" required>

                <label for="product_status">Status:</label>
                <select id="product_status" name="product_status" required>
                    <option value="AVAILABLE">Available</option>
                    <option value="UNAVAILABLE">Unavailable</option>
                </select>

                <label for="product_image">Image:</label>
                <input type="file" id="product_image" name="product_image" accept="image/*">


                <button type="save">Save</button>
            </form>
        </div>
    </div>


    <script>
        function openModal(products_id, item_code, product_name, categories_id, product_stocks, product_status, product_desc, product_price) {
            document.getElementById('productId').value = products_id; // Store the product ID
            document.getElementById('item_code').value = item_code;
            document.getElementById('product_name').value = product_name;
            document.getElementById('categories_id').value = categories_id; // Use categories_id instead of category_name
            document.getElementById('product_stocks').value = product_stocks;
            document.getElementById('product_desc').value = product_desc; // Add description field
            document.getElementById('product_price').value = product_price;
            document.getElementById('product_status').value = product_status; // Set the status
            document.getElementById('editModal').style.display = 'block'; // Show the modal
        }


        function closeModal() {
            document.getElementById('editModal').style.display = 'none'; // Hide the modal
        }


        window.onclick = function(event) {
            if (event.target === document.getElementById('editModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>


