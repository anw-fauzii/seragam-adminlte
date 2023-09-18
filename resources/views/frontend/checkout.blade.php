<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Seragam Prima Insani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: rgb(251,225,19);
            background: linear-gradient(0deg, rgba(251,225,19,1) 0%, rgba(255,149,0,1) 100%);
            margin: 0;
        }

        .container {
            flex: 1;
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            margin-left: auto;
            margin-right: auto;
        }

        .banner {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .banner img {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .banner:hover img {
            transform: scale(1.05);
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            padding: 20px;
            transform: translateY(100%);
        }

        .banner:hover .banner-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .banner-text {
            text-align: center;
        }

        .btn-shop-now {
            margin-top: 10px;
            background-color: #ff6b6b;
            border-color: #ff6b6b;
            transition: background-color 0.3s ease-in-out;
            font-size: 12px; /* Ukuran tombol diperkecil */
            padding: 5px 10px; /* Padding tombol diperkecil */
        }

        .btn-shop-now:hover {
            background-color: #e95757;
            border-color: #e95757;
        }

        .order-list {
            max-height: 300px;
            overflow-y: auto;
        }

        footer {
            background: rgb(255,149,0);
            background: linear-gradient(0deg, rgba(255,149,0,1) 0%, rgba(251,225,19,1) 100%);
            padding: 10px 0;
            text-align: center;
        }
        
        .swal2-actions {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<!-- Header with logo -->
<header class="p-4 text-center">
    <img src="{{ asset('storage/logo.png') }}" alt="Logo" height="50">
</header>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
<!-- Main content area -->
<div class="container mt-4">
    <div class="row">
        <!-- Card 1: Small Banners -->
        <div class="col-md-8 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-center">Pesanan Anda</h5>
                    <table class="table table-sm" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" width="5">#</th>
                                <th scope="col" width="40">Barang</th>
                                <th scope="col" width="10">Qty</th>
                                <th scope="col" width="20">Hrg. Satuan</th>
                                <th scope="col" width="20">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($Keranjang as $item) 
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$item->seragam_detail->seragam->nama_seragam}} ({{$item->ukuran}})</td>
                                    <td class="text-center">{{$item->jumlah}}</td>
                                    <td>{{number_format($item->seragam_detail->harga)}}</td>
                                    <td>{{number_format($item->subtotal)}}</td>
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
                </div>
            </div>
        </div>
        <!-- Card 2: Order List -->
        <div class="col-md-4 mb-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-center">Data Siswa</h5>
                    <table class="table" width="100%">
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" class="form-control" required name="nama" id="nama"></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td><input type="text" class="form-control" required name="kelas" id="kelas"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><button class="btn btn-primary btn-show-modal" data-bs-toggle="modal" data-bs-target="#konfirmasi">Konfirmasi</button></td>
                        </tr>
                    </table>
                    @include('frontend.konfirmasi')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2023 Yayasan Prima Insani. All rights reserved.</p>
</footer>
</body>
<script>
    // Fungsi untuk menampilkan data nama dan kelas di modal
    document.querySelector('.btn-show-modal').addEventListener('click', function() {
        const nama = document.getElementById('nama').value;
        const kelas = document.getElementById('kelas').value;
        
        document.getElementById('modalNama').value = nama;
        document.getElementById('modalKelas').value = kelas;
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>