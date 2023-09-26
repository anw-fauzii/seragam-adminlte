<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Seragam;
use App\Models\SeragamDetail;
use Illuminate\Http\Request;
use PDF;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        $Seragam = Seragam::where('kategori', $id)->simplePaginate(3);
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
        $pesanan = Pesanan::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'total_harga' => $Keranjang->sum('subtotal')
        ]);
        foreach ($Keranjang as $data) {
            PesananDetail::create([
                'pesanan_id' => $pesanan->id,
                'seragam_detail_id' => $data->seragam_detail_id,
                'jumlah' => $data->jumlah,
                'catatan' => $data->catatan,
                'ip_pelanggan' => $data->ip_pelanggan,
                'subtotal' => $data->subtotal
            ]);
            $seragam = SeragamDetail::find($data->seragam_detail_id);
            $seragam->update([
                'stok' => $seragam->stok - $data->jumlah,
            ]);
        }
        Keranjang::where('ip_pelanggan', $request->getClientIp())->delete();

        $pdf = PDF::loadView('frontend.nota', compact('pesanan'))->setPaper('a5', 'portrait');
        $pdfPath = storage_path('app/public/notaPembelian/' . $pesanan->kode . '.pdf');
        $pdf->save($pdfPath);
        $pdfUrl = url('storage/notaPembelian/' . $pesanan->kode . '.pdf');
        return redirect()->route('welcome')->with('pdfUrl', $pdfUrl)->with('success', 'Berhasil dipesan. Invoice otomoatis didownlaod');
    }
}
