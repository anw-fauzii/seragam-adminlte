<div class="modal fade" id="productModal{{$item->id}}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                @if ($item->foto)
                                    <img src="{{asset('storage/Foto Seragam/'. $item->foto)}}" alt="Product 1"  width="100%" class="card-img-top product-image">
                                @else
                                    <img src="{{asset('storage/error.jpeg')}}" alt="Product 1"  width="100%" class="card-img-top product-image">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td colspan="2" width="100%"><strong>{{$item->nama_seragam}}</strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>Rp. {{number_format($item->harga)}}</td>
                            </tr>
                            <tr>
                                <td width="25%">Ukuran</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        @foreach ($item->seragam_detail as $ukuran)
                                        <input type="hidden" name="seragam_detail_id" value="{{$ukuran->id}}">
                                            <input type="radio" class="btn-check" name="btnradio{{$item->id}}" id="btnradio1{{$item->id}}" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio1{{$item->id}}">{{$ukuran->ukuran}}</label>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kuantitas</td>
                                <td><input type="number" name="jumlah" class="form-control" value="0" min="0"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>