<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seragam = Seragam::all();
        return view('seragam.index', compact('seragam'));
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
            'foto' => 'required|image|mimes:jpeg,jpg,png',
            'kategori' => 'required',
            'nama_seragam' => 'required',
        ]);
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $file->storeAs('public/Foto Seragam', $file->hashName());
        }
        $sa = Seragam::create([
            'nama_seragam' => $request->nama_seragam,
            'kategori' => $request->kategori,
            'foto' => $file->hashName(),
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seragam $seragam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama_seragam' => 'required',
        ]);
        $seragam = Seragam::findOrFail($id);
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $file->storeAs('public/Foto Seragam', $file->hashName());
            Storage::delete('public/Foto Seragam/' . $seragam->foto);
            $seragam->update([
                'nama_seragam' => $request->nama_seragam,
                'kategori' => $request->kategori,
                'foto' => $file->hashName(),
            ]);
        } else {
            $seragam->update([
                'nama_seragam' => $request->nama_seragam,
                'kategori' => $request->kategori,
            ]);
        }
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $seragam = Seragam::findOrFail($id);
        Storage::delete('public/Foto Seragam/' . $seragam->foto);
        $seragam->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
