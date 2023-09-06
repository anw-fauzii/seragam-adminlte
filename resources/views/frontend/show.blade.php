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
                    <h5 class="card-title mb-4 text-center">Pilihan Seragam</h5>
                    <div class="row">
                        <!-- Product 1 -->
                        <div class="col-md-4 mb-4">
                            <div class="card product-card">
                                <img src="{{asset('storage/seragam.jpg')}}" alt="Product 1" class="card-img-top product-image">
                                <div class="card-body">
                                    <h5 class="card-title product-name">Seragam Senin</h5>
                                    <button class="btn btn-primary btn-show-modal" data-bs-toggle="modal" data-bs-target="#productModal">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                        <!-- Product 2 -->
                        <div class="col-md-4 mb-4">
                            <div class="card product-card">
                                <img src="{{asset('storage/seragam.jpg')}}" alt="Product 2" class="card-img-top product-image">
                                <div class="card-body">
                                    <h5 class="card-title product-name">Seragam Selasa</h5>
                                    <button class="btn btn-primary btn-show-modal" data-bs-toggle="modal" data-bs-target="#productModal">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                        <!-- Product 3 -->
                        <div class="col-md-4 mb-4">
                            <div class="card product-card">
                                <img src="{{asset('storage/seragam.jpg')}}" alt="Product 3" class="card-img-top product-image">
                                <div class="card-body">
                                    <h5 class="card-title product-name">Seragam Rabu</h5>
                                    <button class="btn btn-primary btn-show-modal" data-bs-toggle="modal" data-bs-target="#productModal">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card product-card">
                                <img src="{{asset('storage/seragam.jpg')}}" alt="Product 3" class="card-img-top product-image">
                                <div class="card-body">
                                    <h5 class="card-title product-name">Seragam Kamis</h5>
                                    <button class="btn btn-primary btn-show-modal" data-bs-toggle="modal" data-bs-target="#productModal">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card 2: Order List -->
        <div class="col-md-4 mb-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-center">Pesanan Anda</h5>
                        <table class="table table-sm" width="100%">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" width="5">#</th>
                                        <th scope="col" width="40">Barang</th>
                                        <th scope="col" width="10">Qty</th>
                                        <th scope="col" width="40">Harga</th>
                                        <th scope="col" width="5">X</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Seragam Merah Putih SD</td>
                                        <td class="text-center">1</td>
                                        <td>Rp. 150,000</td>
                                        <td class="text-center">X</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Seragam Olahraga SD</td>
                                        <td class="text-center">1</td>
                                        <td>Rp. 175,000</td>
                                        <td class="text-center">X</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Seragam Olahraga TK</td>
                                        <td class="text-center">1</td>
                                        <td>Rp. 100,000</td>
                                        <td class="text-center">X</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th colspan="2">Rp. 425,000</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-center"><button class="btn btn-primary btn-shop-now"  id="deleteButton">Pesan</button></th>
                                    </tr>
                                </tfoot>
                        </table>
                </div>
                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
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
    document.getElementById("deleteButton").addEventListener("click", function() {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>