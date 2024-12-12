<?php  

namespace App\Http\Controllers;  

use App\Models\Admin;  
use App\Models\Client;  
use App\Models\Product;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Hash;  

class AdminAuthController extends Controller  
{  
    public function showRegisterForm()  
    {  
        return view('admin.register');  
    }  

    public function register(Request $request)  
    {  
        $request->validate([  
            'email' => 'required|email|unique:admins',  
            'username' => 'required|string|max:255|unique:admins',  
            'password' => 'required|string|min:6|confirmed',  
        ]);  

        Admin::create([  
            'email' => $request->email,  
            'username' => $request->username,  
            'password' => Hash::make($request->password),  
        ]);  

        return redirect('/admin/login')->with('success', 'Registration successful. Please log in.');  
    }  

    public function showLoginForm()  
    {  
        return view('admin.login');  
    }  

    public function login(Request $request)  
    {  
        $request->validate([  
            'login' => 'required|string',  
            'password' => 'required|string',  
        ]);  

        $credentials = [  
            filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $request->login,  
            'password' => $request->password,  
        ];  

        if (Auth::guard('admin')->attempt($credentials)) {  
            return redirect('/admin/dashboard');  
        }  

        return back()->withErrors(['Invalid credentials.']);  
    }  

    public function dashboard()  
    {  
        // Mendapatkan semua klien beserta pembeliannya  
        $clients = Client::with(['purchases.product'])->paginate(10);
        // Mengambil semua produk  
        $products = Product::all();   

        // Pastikan jika $products tidak null  
        if ($products === null) {  
            $products = collect(); // Menginisialisasi menjadi koleksi kosong  
        }  

        // Alternatif menggunakan koleksi kosong jika tidak ada produk  
        if ($products->isEmpty()) {  
            $products = collect(); // Pastikan produk adalah koleksi kosong  
        }  

        return view('admin.dashboard', compact('clients', 'products'));  
    }  

    public function logout(Request $request)  
    {  
        Auth::guard('admin')->logout();  
        $request->session()->invalidate();  
        $request->session()->regenerateToken();  

        return redirect('/admin/login')->with('success', 'You have successfully logged out.');  
    }  
}