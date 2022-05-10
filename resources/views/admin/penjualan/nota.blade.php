<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <style>
        @page {
            size: A4
        }

        body {
            font-family: arial;
            font-size: 9px;
            -webkit-print-color-adjust: exact;
        }

        h1 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }

        h2 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }

        h3 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }

        h4 {
            font-weight: bold;
            font-size: 7pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        hr {
            border: 1px solid #000000;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>

<body>

    <h1>{{ $config->nama }}</h1>
    {{-- <h2>{{ $config->alamat }}</h2> --}}
    {{-- <h3 style="text-align: left; width:50%">Kasir : {{ $config->pemilik }}</h3> --}}
	{{-- <h3 style="text-align: left; width:50%">HP/WA : 085363896615</h3> --}}
    <h3 style="background-color: darkgrey; width:50%"><u>Nota Penjualan</u></h3>
    <table style="width:50%">
        <thead>
            <tr style="background: #A9A9A9">
                <th>No Faktur</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td>{{ $penjualan->nota_jual }}</td>
                <td>{{ $penjualan->created_at }}</td>
                <td>{{ $penjualan->nama_pembeli }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table border="1" style="width:85%">
	<?php $no = 1; ?>
        <thead>
            <tr style="background: #A9A9A9">
				<th style="width:3%">No</th>
                <th style="width:5%">JML</th>
                <th style="width:5%">Satuan</th>
                <th style="width:57%">Barang</th>
                <th style="width:15%">Harga Jual</th>
                <th style="width:15%">Nilai Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $diskon = 0;
            $grand_total = 0;
            $subtotal = 0;
            ?>
            @foreach ($detail_jual as $i)
                <?php
                $diskon += $i->diskon;
                $grand_total += $i->total_jual;

                // $subtotal = $
                ?>
                <tr>
					<td style="width:3%">{{ $no++ }}
                    <td style="width:5%">{{ $i->jml_jual }}</td>
                    <td style="width:5%">{{ $i->satuan }}</td>
                    <td style="width:57%">{{ $i->nama }}</td>
					<td style="width:15%">{{$i->harga_jual}}</td>
                    <td style="width:15%">{{$i->total_jual}}</td>

                </tr>
            @endforeach
        </tbody>
        <tfoot style="text-align: right;font-weight:bold">


        </tfoot>
    </table>
    <hr>
    <table style="text-align:right;font-weight:bold; width:50%">
        <tr>
            <td>Grand Total :</td>
            <td>@currency($penjualan->total_jual)</td>
        </tr>
        <tr>
            <td>Bayar :</td>
            <td>@currency($penjualan->bayar)</td>
        </tr>
        <tr>
            <td>Kembalian :</td>
            <td>@currency($penjualan->kembalian)</td>
        </tr>
    </table>
    <p align="center">
        &#128522; &#128522; &#128522;
    </p>
</body>
<script>
    window.print();

</script>

</html>
