<div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('checkout')}}" method="post">
                @csrf
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td><label for="modalNama">Nama:</label></td>
                            <td><input type="text" class="form-control" required name="nama" id="modalNama" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="modalKelas">Kelas:</label></td>
                            <td><input type="text" class="form-control" required name="kelas" id="modalKelas" readonly></td>
                        </tr>
                    </table>
                    <table class="table table-sm" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" width="5">#</th>
                                <th scope="col" width="40">Barang</th>
                                <th scope="col" width="10">Qty</th>
                                <th scope="col" width="10">Hrg. Satuan</th>
                                <th scope="col" width="10">Subtotal</th>
                                <th scope="col" width="20">Catatan</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($Keranjang as $item) 
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$item->seragam_detail->seragam->nama_seragam}} ({{$item->seragam_detail->ukuran}})</td>
                                    <td class="text-center">{{$item->jumlah}}</td>
                                    <td>{{number_format($item->seragam_detail->harga)}}</td>
                                    <td>{{number_format($item->subtotal)}}</td>
                                    <td>{{$item->catatan}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total</th>
                                <th colspan="2">Rp. {{number_format($Keranjang->sum('subtotal'))}}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <p><strong>*catatan:</strong> untuk ukuran boleh diganti ketika disekolah</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>