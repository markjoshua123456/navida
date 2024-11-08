<?php


namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function create()
    {
        $products = Product::all(); // Assuming 'Product' is your model
        $categories = Category::all();
        return view('products.create', compact('categories','products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'categories_id' => 'required|integer|exists:categories,id',
            'product_name' => 'required|string|max:255',
            'product_stocks' => 'required|integer|min:0',
            'product_status' => 'required|string|in:AVAILABLE,UNAVAILABLE',
            'product_desc' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $imagePath = $request->hasFile('product_image') ?
            $this->uploadProductImage($request->file('product_image')) : null;


        Product::create([
            'categories_id' => $request->categories_id,
            'product_name' => $request->product_name,
            'product_stocks' => $request->product_stocks,
            'product_status' => $request->product_status,
            'product_desc' => $request->product_desc,
            'product_price' => $request->product_price,
            'product_image' => $imagePath,
        ]);


        return redirect()->route('products.create')->with('product_success', 'Product added successfully!');
    }


    protected function uploadProductImage($image)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('product_images'), $imageName);
        return 'product_images/' . $imageName;
    }


    public function view()
    {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    


    public function productMenu()
    {
        return view('products.menu');
    }

    public function showByCategory($category_id)
{
    // Fetch products that belong to the selected category
    $products = Product::where('categories_id', $category_id)->get();
    
    // Get all categories to display in the view
    $categories = Category::all();

    // Pass the filtered products and categories to the view
    return view('products.create', compact('products', 'categories'));
}

    // Remove the edit method since it's handled via modal in the list view
    // public function edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $categories = Category::all();
    //     return view('products.edit', compact('product', 'categories'));
    // }


    public function update(Request $request)

    {
        $request->validate([
            'products_id' => 'required|integer|exists:products,products_id',
            'categories_id' => 'required|integer|exists:categories,id',
            'product_name' => 'required|string|max:255',
            'product_stocks' => 'required|integer|min:0',
            'product_status' => 'required|string|in:AVAILABLE,UNAVAILABLE',
            'product_desc' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   // Retrieve the product by products_id
   $product = Product::where('products_id', $request->products_id)->firstOrFail();
   $imagePath = $product->product_image;
        if ($request->hasFile('product_image')) {
            // Delete the old image if it exists
            if ($imagePath) {
                unlink(public_path($imagePath));
            }
            $imagePath = $this->uploadProductImage($request->file('product_image'));
        }


        $product->update([
            'categories_id' => $request->categories_id,
            'product_name' => $request->product_name,
            'product_stocks' => $request->product_stocks,
            'product_status' => $request->product_status,
            'product_desc' => $request->product_desc,
            'product_price' => $request->product_price,
            'product_image' => $imagePath,
        ]);


        return redirect()->route('products.view')->with('product_success', 'Product updated successfully!');

    }
    public function destroy($id)
{
    $product = Product::findOrFail($id);


    // Delete the product image if it exists
    if ($product->product_image) {
        unlink(public_path($product->product_image));
    }


    $product->delete();


    return redirect()->route('products.view')->with('product_success', 'Product deleted successfully!');
}



}
