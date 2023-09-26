<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('seragam.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_seragam" class="col-sm-2 col-form-label">Seragam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_seragam') is-invalid @enderror" value="{{ old('nama_seragam') }}" name="nama_seragam" id="nama_seragam" placeholder="Nama Seragam">
                            @error('nama_seragam')
                                <span class="error invalid-feedback" style="inline">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="kategori" style="width: 100%;">
                                <option disable="true" selected="true" disabled>--- Pilih UNIT ---</option>
                                <option value="1">PG</option>
                                <option value="2">TK</option>
                                <option value="3">SD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
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