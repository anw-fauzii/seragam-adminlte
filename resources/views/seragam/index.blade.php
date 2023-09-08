@extends('adminlte::page')

@section('title', 'Seragam')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Seragam</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Seragam</li>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @forelse ($seragam as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        @if($item->kategori == 1)
                            <td>PG</td>
                        @elseif($item->kategori == 2)
                            <td>TK</td>
                        @elseif($item->kategori == 3)
                            <td>SD</td>
                        @endif
                        <td>{{$item->nama_seragam}}</td>
                        <td>
                            <button type="button" class="btn-xs bg-gradient-primary " data-toggle="modal" data-target="#edit{{$item->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn-xs bg-gradient-success " data-toggle="modal" data-target="#show{{$item->id}}">
                                <i class="fas fa-info"></i>
                            </button>
                            @include('seragamDetail.show')
                            @include('seragam.edit')
                            <a href="#" type="button"  data-id="{{ $item->id }}" class="btn-xs bg-gradient-danger delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@include('seragam.create')
@stop

@section('css')

@stop

@section('js')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
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
        $('table[data-datatable="true"]').each(function() {
            var tableId = $(this).attr('id');
            $('#' + tableId).DataTable();
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