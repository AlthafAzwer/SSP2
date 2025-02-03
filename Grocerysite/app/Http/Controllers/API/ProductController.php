<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch only active products if you have an 'is_active' flag
        $products = Product::where('is_active', true)->get();

        // Return JSON data
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        // Validate the request including file upload
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Store the uploaded file in 'storage/app/public/products'
        $imagePath = $request->file('image')->store('products', 'public');

        // Create the product record in the database
        $product = Product::create([
            'image' => $imagePath,
            'category' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_active' => true,
        ]);

        return response()->json(['message' => 'Product added successfully', 'product' => $product], 201);
    }


    // GET /api/products/{id}
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    // PUT or PATCH /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|string',
            'category' => 'sometimes|required|string|max:255',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'is_active' => 'sometimes|boolean'
        ]);

        $product->update($validated);

        return response()->json($product, 200);
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted'], 200);
    }
}
