<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use App\Models\SeragamDetail;
use Illuminate\Http\Request;

class SeragamDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Seragam = Seragam::all();
        $SeragamDetail = SeragamDetail::orderBy('seragam_id', 'ASC')->get();
        return view('seragamDetail.index', compact('Seragam', 'SeragamDetail'));
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
        $this->validate($request, [
            'seragam_id' => 'required',
            'ukuran' => 'required',
            'stok' => 'required',
        ]);
        $harga = str_replace(',', '', $request->harga);
        $SeragamDetail = SeragamDetail::create([
            'seragam_id' => $request->seragam_id,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok,
            'harga' => $harga,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeragamDetail $seragamDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeragamDetail $seragamDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeragamDetail $seragamDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeragamDetail $seragamDetail)
    {
        //
    }
}
