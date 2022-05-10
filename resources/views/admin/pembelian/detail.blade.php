@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="span12">
            <div class="card">
                <div class="card-header" style="padding: 15px">
                    <table border="0">
                        <tr>
                            <td>Nama</td>
                            <td>{{ $nama_supplier->nama }}</td>
                            <td colspan='4'>
                                <font class="pull-right">
                                    <a href="{{ route('pembelian.cetak_nota', $pembelian->no_faktur) }}" target="_blank" class="btn btn-default" title="Cetak"><i class="icon-print" style="font-size: 20px;"></i></a>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>No. Faktur</td>
                            <td>{{ $pembelian->no_faktur }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tanggal Transaksi</td>
                            <td>{{ $pembelian->created_at->isoFormat('D MMMM Y')}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cara Bayar</td>
                            <td>{{ $pembelian->cara_bayar }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sisa Bayar</td>
                            <td>@currency($pembelian->sisa_bayar)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    
                     
                </div>
                <div class="card-content">
                    <table class="responsive-table">
                        <thead class="teal lighten3">
                            <tr>
                                <th>Nama Obat</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Diskon</th>
                                <th>Jumlah Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_beli as $item)
                            <tr>   
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jml_beli }}</td>
                                <td>@currency($item->harga_beli)</td>
                                <td>@currency($item->subtotal)</td>
                                <td>@currency($item->diskon)</td>
                                <td>@currency($item->total)</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection