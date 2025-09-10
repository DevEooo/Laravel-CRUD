<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('products.index', ['title' => 'List of Products', 'products' => $products]);
    }

    public function create()
    {
        return view('products/create', ['title' => 'Add Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('products', 'public');
        Product::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'categoryName' => $request->categoryName,
                'price' => $request->price,
                'image' => $path,
            ]
        );
        return redirect('/products/create')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect('/products')->with('error', 'Update failed');
        }

        return view('products.edit', ['title' => 'Edit Product', 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect('/products')->with('error', 'Product not found!');
        }
        $data = $request->only(['name', 'description', 'categoryName', 'price']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
            // If you want to delete the old image, you can do it here
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        }
        $product->update($data);
        return redirect('/products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->delete();
            return redirect('/products')->with('Success', 'Product deleted successfully');
        }
        return redirect('/products')->with('error', 'Product not found');
    }
}
