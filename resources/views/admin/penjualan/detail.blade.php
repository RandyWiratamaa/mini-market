@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header" style="padding: 15px">
                            <table border="0">
                                <tr>
                                    <td colspan='4'>
                                        <font class="pull-right">
                                            <a href="{{ route('penjualan.cetak_nota', $penjualan->nota_jual) }}"
                                                target="_blank" class="btn btn-default" title="Cetak"><i
                                                    class="icon-print text-danger" style="font-size: 20px;"></i></a>
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. Nota</td>
                                    <td>{{ $penjualan->nota_jual }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi</td>
                                    <td>{{ $penjualan->created_at->isoFormat('D MMMM Y') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>


                        </div>
                        <div class="card-body">
                            <table class="responsive-table">
                                <thead class="teal lighten3">
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Harga Modal</th>
                                        <th>Qty</th>
                                        <th>Harga Jual</th>
                                        <th>Sub Total</th>
                                        <th>Diskon</th>
                                        <th>Jumlah Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail_jual as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>@currency($item->harga_beli)</td>
                                            <td>{{ $item->jml_jual }}</td>
                                            <td>@currency($item->harga_jual)</td>
                                            <td>@currency($item->subtotal)</td>
                                            <td>@currency($item->diskon)</td>
                                            <td>@currency($item->total_jual)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
