<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\SeragamDetail;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Keranjang = Keranjang::where('ip_pelanggan', $request->getClientIp())->get();
        return view('frontend.checkout', compact('Keranjang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cekHarga = SeragamDetail::findOrFail($request->seragam_id);
        $ukuran = $request->ukuran[$cekHarga->seragam_id];
        $sa = Keranjang::create([
            'seragam_detail_id' => $request->seragam_detail_id[$ukuran],
            'ukuran' => $ukuran,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'ip_pelanggan' => $request->getClientIp(),
            'subtotal' => $cekHarga->harga * $request->jumlah,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
