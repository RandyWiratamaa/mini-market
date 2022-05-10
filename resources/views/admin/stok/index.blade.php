@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Stok Barang</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped second">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Sisa Stok</th>
                                        <th>Lokasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stok as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->letak }}</td>
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
