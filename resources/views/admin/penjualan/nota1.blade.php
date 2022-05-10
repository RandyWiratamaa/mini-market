<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <style>
        * {
            font-size: 10px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 100px;
            max-width: 100px;
        }

        td.description,
        th.description {
            width: 50px;
            max-width: 50px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 150px;
            max-width: 150px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

    </style>
</head>

<body>
    <div class="ticket">
        {{-- <h1 class="centered">{{ $config->nama }}</h1>
        <h2 class="centered">{{ $config->alamat }}</h2> --}}

        {{-- <p>Pelanggan : {{ $penjualan->nama_pembeli }}</p> --}}
        <p>Tanggal : {{ $penjualan->created_at }}</p>
        <p style="font-weight: bold">No. Faktur : {{ $penjualan->nota_jual }}</p>
        <hr>
        <h3 style="text-align: left">Kasir : {{ $config->pemilik }}</h3>
        <table border='1' style="width: 302px">
            <thead>
                <tr>
                    <th>Q.</th>
                    <th>Satuan</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Nilai Total</th>
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
                        <td>{{ $i->jml_jual }}</td>
                        <td>{{ $i->satuan }}</td>
                        <td>{{ $i->nama }}</td>
                        <td>@currency($i->harga_jual)</td>
                        <td>@currency($i->total_jual)</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="font-weight:bold">Grand Total : @currency($penjualan->total_jual)</p>

    </div>
</body>
<script>
    window.print();

</script>

</html>
