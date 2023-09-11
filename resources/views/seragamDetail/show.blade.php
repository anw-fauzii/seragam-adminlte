<div class="modal fade" id="show{{$item->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Stok Tersedia {{$item->nama_seragam}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('storage/Foto Seragam/'. $item->foto)}}" alt="" width="100%" srcset="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table id="tabel{{$item->id}}" class="table table-bordered table-striped" data-datatable="true">
                            <thead>
                                <tr>
                                    <th>Ukuran</th>
                                    <th>Stok Tersedia</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @forelse ($item->seragam_detail as $detail)
                                    <tr>
                                        <td>{{$detail->ukuran}}</td>
                                        <td>{{$detail->stok}}</td>
                                        <td>Rp. {{ number_format($detail->harga) }}</td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>