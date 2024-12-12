<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }



    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_age' => 'required|integer|min:0',
            'max_age' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->file('image') 
            ? $request->file('image')->store('products', 'public') 
            : null;

        Product::create([
            'name' => $request->name,
            'min_age' => $request->min_age,
            'max_age' => $request->max_age,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_age' => 'required|integer|min:0',
            'max_age' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'min_age' => $request->min_age,
            'max_age' => $request->max_age,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    
    public function paymentPage(Product $product)  
    {  
        $client = Auth::guard('client')->user();  
    
        return view('client.products.payment', compact('product', 'client'));  
    }  
    
    public function confirmPurchase(Request $request, Product $product)  
    {  
        // Check if the product is already purchased or if the client is logged in  
        $client = Auth::guard('client')->user();   
    
        if ($client) {  
            // Here, you may want to check if the product has already been purchased  
            // For this example, we'll assume the product can only be marked as purchased once.  
            $product->is_purchased = true; // Mark product as purchased  
            $product->save();  
    
            return redirect()->route('client.products')->with('success', 'Pembelian berhasil dikonfirmasi.');  
        }  
    
        return redirect()->route('client.products')->with('error', 'Silakan masuk untuk melanjutkan pembelian.');  
    }
    

}
