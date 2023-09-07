@extends('adminlte::page')

@section('title', 'Stok Seragam')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Stok Seragam</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('seragam.index')}}">Seragam</a></li>
                <li class="breadcrumb-item active">Stok Seragam</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <button type="button" class="btn bg-gradient-primary " data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-plus-square"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <table id="tabel" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Unit</th>
                    <th>Seragam</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @forelse ($SeragamDetail as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        @if($item->seragam->kategori == 1)
                            <td>PG</td>
                        @elseif($item->seragam->kategori == 2)
                            <td>TK</td>
                        @elseif($item->seragam->kategori == 3)
                            <td>SD</td>
                        @endif
                        <td>{{$item->seragam->nama_seragam}}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@include('seragamDetail.create')
@stop

@section('css')

@stop

@section('js')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var angkaInput = document.getElementById('harga');

    angkaInput.addEventListener('input', function () {
        var value = angkaInput.value.replace(/\D/g, '');
        angkaInput.value = formatRibuan(value);
    });

    function formatRibuan(angka) {
        return angka.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    $(function () {
        $('#tabel').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('.select2').select2({
            theme : 'bootstrap4',
            placeholder : 'Silahkan pilih',
        });
        bsCustomFileInput.init();
        $('body').on('click', '.delete', function (){
        var id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan DELETE ke rute destroy
                    fetch(`/seragam/${id}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                    })
                    location.reload();
                }
            });
        });
        
    });
</script>
@stop