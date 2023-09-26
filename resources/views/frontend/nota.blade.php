<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: -40px;
            background-image: url('{{ public_path('storage/bg.png') }}');
            background-size: 100%; /* Atur ukuran gambar agar seluruh halaman tercakup */
            background-repeat: no-repeat; /* Hindari pengulangan gambar */
            background-attachment: fixed; /* Biarkan gambar latar belakang tetap terlihat saat menggulir */
        }

        #header {
            text-align: center;
        }

        #header h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
            margin-top: 5px;
        }

        #header img {
            width: 110px;
            padding-top: 25px;
        }

        table {
           padding-left: 30px;
           padding-right: 30px;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #details td {
            font-weight: bold;
        }

        #items {
            margin-top: 20px;
        }

        #items th {
            background-color: #333;
            color: white;
        }

        #items th, #items td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="{{ public_path('storage/icon.png') }}" alt="">
        <h2>INVOICE</h2>
    </div>
    <table id="details">
        <tr>
            <td width="20%">Kode</td>
            <td width="5%" style="text-align: center">:</td>
            <td>{{$pesanan->kode}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td width="5%" style="text-align: center">:</td>
            <td>{{$pesanan->nama}}</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td width="5%" style="text-align: center">:</td>
            <td>{{$pesanan->kelas}}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td width="5%" style="text-align: center">:</td>
            <td>{{$pesanan->created_at->format('d/m/Y')}}</td>
        </tr>
    </table>
    <table id="items">
        @php
            $no = 1;
        @endphp
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Qty.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan->pesanan_detail as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->seragam_detail->seragam->nama_seragam}} ({{$item->seragam_detail->ukuran}})</td>
                    <td>{{$item->jumlah}}</td>
                    <td>Rp. {{number_format($item->subtotal)}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: center"><strong>Total Harga</strong></td>
                <td><strong>Rp. {{number_format($pesanan->total_harga)}}</strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
