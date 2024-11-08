<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    @vite(['resources/css/create/create.css'])
</head>
<body>
    @include('navbar.navbar')
    <h1>Add Food Items</h1>

    <button class="action-button add-category-button">Add Category</button>
    <button class="action-button add-new-item-button" id="addNewItemBtn">Add New Item</button>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display categories outside modal -->
    <div class="category-container">
        @foreach ($categories as $category)
        <a href="{{ route('products.category', ['category_id' => $category->id]) }}" class="category-button">
                {{ $category->category_name }}
            </a>
        @endforeach
    </div>

    

    <!-- Product Display Section -->
    <div class="product-grid">
    @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset($product->product_image) }}" alt="Product Image" width="100">
            <h5 class="product-name">Product Name: {{ $product->product_name }}</h5>
            <p class="product-price">Price: {{ $product->product_price }}</p>
        </div>
    @endforeach
    </div>

    <!-- Add New Item Modal -->
    <div id="addItemModal" class="modal">
        <div class="modal-content">
            <h2>Add New Product</h2>
            @if (session('product_success'))
                <div class="success-modal">
                    {{ session('product_success') }}
                </div>
            @endif
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="image-upload">
                        <label for="product_image" class="upload-logo">
                            <img id="previewImage" src="#" alt="Image Preview" style="display: none; width: 100px; height: auto;">
                            <span>Upload Image</span>
                        </label>
                        <input type="file" name="product_image" accept="image/*" id="product_image" required style="display: none;">
                    </div>
                    <div class="category-select">
                        <label for="categories_id">Category Name:</label>
                        <select name="categories_id" id="categories_id" class="category-dropdown" required>
                            <option value="">Select Category:</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" class="text-input" required><br>

                <label for="product_stocks">Product Stocks:</label>
                <input type="number" name="product_stocks" class="number-input" required><br>

                <label for="product_status">Product Status:</label>
                <select name="product_status" id="product_status" class="status-dropdown" required>
                    <option value="AVAILABLE">Available</option>
                    <option value="UNAVAILABLE">Unavailable</option>
                </select><br>

                <label for="product_desc">Product Description:</label>
                <textarea name="product_desc" class="text-area" required></textarea><br>

                <label for="product_price">Product Price:</label>
                <input type="text" name="product_price" class="text-input" required><br>

                <div class="button-wrapper">
                    <button type="submit">Add Product</button>
                    <button class="close" id="closeModal">Close</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="modal">
        <div class="modal-content">
            <h2>Add Category</h2>
            @if (session('category_success'))
                <div class="success-modal">
                    {{ session('category_success') }}
                </div>
            @endif
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <label for="category_name">Category Name:</label>
                <input type="text" name="category_name" id="category_name" class="category-input" required><br>
                <div class="button-wrapper">
                    <button type="submit">Add Category</button>
                    <button class="close" id="closeCategoryModal">Close</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        // Get modal and button elements for "Add Item"
        var addItemModal = document.getElementById("addItemModal");
        var addItemBtn = document.getElementById("addNewItemBtn");
        var closeAddItemBtn = document.getElementById("closeModal");

        // Get modal and button elements for "Add Category"
        var addCategoryModal = document.getElementById("addCategoryModal");
        var addCategoryBtn = document.querySelector(".add-category-button");
        var closeCategoryBtn = document.getElementById("closeCategoryModal");

        // When the user clicks the "Add New Item" button, open the "Add Item" modal
        addItemBtn.onclick = function() {
            addItemModal.style.display = "block";
        }

        // Close button for "Add Item" modal
closeAddItemBtn.onclick = function() {
    addItemModal.style.display = "none";
}

        // When the user clicks the "Add Category" button, open the "Add Category" modal
        addCategoryBtn.onclick = function() {
            addCategoryModal.style.display = "block";
        }

        // When the user clicks the close button on "Add Category" modal, close it
        closeCategoryBtn.onclick = function() {
            addCategoryModal.style.display = "none";
        }

        // When the user clicks anywhere outside a modal, close it
        window.onclick = function(event) {
            if (event.target == addItemModal) {
                addItemModal.style.display = "none";
            }
            if (event.target == addCategoryModal) {
                addCategoryModal.style.display = "none";
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
    // Check if the product success message is present
    if (document.querySelector('.success-modal') && '{{ session("product_success") }}') {
        // Open the "Add New Product" modal if a product success message is present
        var addItemModal = document.getElementById("addItemModal");
        addItemModal.style.display = "block";
    }

    // Check if the category success message is present
    if (document.querySelector('.success-modal') && '{{ session("category_success") }}') {
        // Open the "Add Category" modal if a category success message is present
        var addCategoryModal = document.getElementById("addCategoryModal");
        addCategoryModal.style.display = "block";
    }
});
document.getElementById("product_image").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const previewImage = document.getElementById("previewImage");
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block"; // Show the preview
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none"; // Hide if no file is selected
        }
    });

    </script>
</body>
</html>
