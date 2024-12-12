<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Purchase;  

class ClientAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('client.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:clients',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female',
        ]);

        Client::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
        ]);

        return redirect('/client/login')->with('success', 'Registration successful. Please log in.');
    }

    public function showLoginForm()
    {
        return view('client.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('client')->attempt($request->only('username', 'password'))) {
            return redirect('/client/dashboard');
        }

        return back()->withErrors(['Invalid credentials.']);
    }

    public function dashboard()
    {
        $client = Auth::guard('client')->user();
        return view('client.dashboard', compact('client'));
    }


    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/client/login')->with('success', 'You have successfully logged out.');
    }

    public function products()
{
    $client = Auth::guard('client')->user();
    $products = Product::all();

    return view('client.products.index', compact('client', 'products'));
}

// public function buy(Product $product)
// {
//     $client = Auth::guard('client')->user();

//     if ($client->age < $product->min_age || ($product->max_age && $client->age > $product->max_age)) {
//         return back()->withErrors('Your age does not match the product age requirements.');
//     }

//     return back()->with('success', 'You have purchased the product: ' . $product->name);
// }
    

public function payment(Request $request, Product $product)  
{  
    $client = Auth::guard('client')->user();  

    // Cek apakah umur klien memenuhi syarat usia produk  
    if ($client->age < $product->min_age || ($product->max_age && $client->age > $product->max_age)) {  
        return redirect()->back()->withErrors('Umur Anda tidak memenuhi syarat untuk produk ini.');  
    }  

    // Buat entri pembelian  
    Purchase::create([  
        'client_id' => $client->id,  
        'product_id' => $product->id,  
    ]);  

    return redirect()->back()->with('success', 'Pembelian berhasil dilakukan.');  
}  



public function buy(Product $product)  
{  
    // Logika untuk memproses pembelian sebelum konfirmasi, jika perlu  
    return view('client.products.buy', compact('product'));  
}  

public function confirmPurchase(Request $request, Product $product)  
{  
    $client = Auth::guard('client')->user();  

    // Cek apakah usia klien memenuhi syarat  
    if ($client->age < $product->min_age || ($product->max_age && $client->age > $product->max_age)) {  
        return redirect()->back()->withErrors('Usia Anda tidak memenuhi syarat untuk produk ini.');  
    }  

    // Simpan pembelian  
    // Contoh logika pembelian (asumsi ada model Purchase)  
    Purchase::create([  
        'client_id' => $client->id,  
        'product_id' => $product->id,  
    ]);  

    // Berikan notifikasi sukses  
    return redirect()->route('client.products')->with('success', 'Pembelian berhasil dilakukan!')->with('purchased_products', [$product->name]);  
}  
}
