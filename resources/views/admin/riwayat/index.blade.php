@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Riwayat Penjualan Barang</h2>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped second" style="width: 100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama Barang</th>
                                        <th>Stok Awal</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                        <th>Stok Akhir</th>
                                        <th>Bagian</th>
                                        <th>Tanggal</th>
                                        <th>Petugas</th>
                                        <th>No Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->stok_awal }}</td>
                                            <td>{{ $item->masuk }}</td>
                                            <td>{{ $item->keluar }}</td>
                                            <td>{{ $item->stok_akhir }}</td>
                                            <td>{{ $item->bagian }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->no_faktur }}</td>
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
