<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function confirm(Request $request)
    {
        // Simpan data pembayaran
        $client = Client::where('username', $request->username)->first();

        if ($client) {
            $client->update([
                'is_purchased' => true,
            ]);
        }

        // Redirect ke dashboard admin
        return redirect()->route('admin.dashboard')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
