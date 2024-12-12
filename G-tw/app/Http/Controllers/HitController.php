<?php

namespace App\Http\Controllers;

use App\Models\Hit;
use Illuminate\Http\Request;

class HitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data dari tabel hits
        $hits = Hit::orderBy('created_at', 'desc')->get();

        // Kirim data ke view (jika menggunakan Blade)
        return view('monitoring', compact('hits'));

        // Untuk API: return response()->json($hits);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'count' => 'required|integer|min:1'
        ]);

        // Simpan data ke tabel hits
        $hit = Hit::create([
            'count' => $request->count
        ]);

        // Kirim respons sukses
        return response()->json([
            'message' => 'Data recorded successfully!',
            'data' => $hit
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hit  $hit
     * @return \Illuminate\Http\Response
     */
    public function show(Hit $hit)
    {
        // Mengembalikan data spesifik berdasarkan ID
        return response()->json($hit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hit  $hit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hit $hit)
    {
        // Hapus data
        $hit->delete();

        // Kirim respons sukses
        return response()->json(['message' => 'Data deleted successfully!']);
    }

    /**
     * Show the form for creating a new resource (Optional for API-only use cases).
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Show the form for editing the specified resource (Optional for API-only use cases).
     *
     * @param  \App\Models\Hit  $hit
     * @return \Illuminate\Http\Response
     */
    public function edit(Hit $hit)
    {
        return view('edit', compact('hit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hit  $hit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hit $hit)
    {
        // Validasi input data
        $request->validate([
            'count' => 'required|integer|min:1'
        ]);

        // Update data
        $hit->update([
            'count' => $request->count
        ]);

        return response()->json(['message' => 'Data updated successfully!', 'data' => $hit]);
    }
}
