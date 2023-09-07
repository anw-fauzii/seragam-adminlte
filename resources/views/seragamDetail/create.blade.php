<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('seragam-detail.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="seragam" class="col-sm-2 col-form-label">Seragam</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="seragam_id" style="width: 100%;">
                                <option disable="true" selected="true" disabled>--- Pilih Seragam ---</option>
                                @forelse ($Seragam as $item)
                                    <option value="{{$item->id}}">{{$item->nama_seragam}}</option>
                                @empty
                                    <option disable="true">--- Belum ada data ---</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('ukuran') is-invalid @enderror" value="{{ old('ukuran') }}" name="ukuran" id="ukuran" placeholder="Masukan Ukuran">
                            @error('ukuran')
                                <span class="error invalid-feedback" style="inline">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" value="0" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" name="stok" id="stok" placeholder="Masukan Stok Awal">
                            @error('stok')
                                <span class="error invalid-feedback" style="inline">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga*</label>
                        <div class="col-sm-10">
                            <input type="text" oninput="formatAngka(this)" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" name="harga" id="harga" placeholder="Masukan Harga Jual">
                            @error('harga')
                                <span class="error invalid-feedback" style="inline">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>