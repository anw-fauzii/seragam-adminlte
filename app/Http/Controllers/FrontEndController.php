<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Seragam;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function welcome(Request $request)
    {
        $Keranjang = Keranjang::where('ip_pelanggan', $request->getClientIp())->get();
        return view('welcome', compact('Keranjang'));
    }

    public function list(Request $request, $id)
    {
        $Keranjang = Keranjang::where('ip_pelanggan', $request->getClientIp())->get();
        $Seragam = Seragam::where('kategori', $id)->get();
        return view('frontend.show', compact('Seragam', 'Keranjang'));
    }

    public function hapus($id)
    {
        $Keranjang = Keranjang::findOrFail($id);
        $Keranjang->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function checkout(Request $request)
    {
        $Keranjang = Keranjang::where('ip_pelanggan', $request->getClientIp())->get();
        dd($Keranjang);
    }
}
