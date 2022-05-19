@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-header">
                            <h3>Nominal Penjualan Hari Ini</h3>
                        </div>
                        <div class="card-body">
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">@currency($penjualan)</h1>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-header">
                            <h3>HPP Penjualan Hari Ini</h3>
                        </div>
                        <div class="card-body">
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">@currency($hpp)</h1>
                            </div>
                        </div>
                    </div>
                </div> --}}
				<?php
					$hpp1 = intval($hpp);
					$penjualan1 = intval($penjualan);

					$untung = $penjualan1 - $hpp1;
				?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-header">
                            <h3>Untung Penjualan Hari Ini</h3>
                        </div>
                        <div class="card-body">
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">@currency($untung)</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-header">
                            <h3>Barang yang Terjual Hari Ini</h3>
                        </div>
                        <div class="card-body">
                            <div class="metric-value d-inline-block">
                                <table id="example" class="table table-striped second">
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jualbyday as $jual)
                                        <tr>
                                            <td>{{ $jual->nama }}</td>
                                            <td>{{ $jual->jml_jual }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-header">
                            <h3>Data Barang yang akan habis</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped first">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Sisa Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($habis_stok as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->stok }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-header">
                            <h3>Total Barang</h3>
                        </div>
                        <div class="card-body">
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{ $total_barang }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
