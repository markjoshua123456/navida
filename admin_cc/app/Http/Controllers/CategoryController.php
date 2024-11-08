<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Ensure the Category model is imported

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back()->with('category_success', 'Category added successfully!');
    }
}
