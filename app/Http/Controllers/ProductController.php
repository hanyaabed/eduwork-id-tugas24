<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('dashboard.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'stock' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);

        $product_category = ProductCategory::findOrFail($request->product_category_id);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $product_category->id;
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }
        $product->save();

        return redirect()->route('product.index')->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'stock' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_category_id = $request->product_category_id;
        if($request->hasFile('image'))
        {
            $product->image = $request->file('image')->store('products', 'public');
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
