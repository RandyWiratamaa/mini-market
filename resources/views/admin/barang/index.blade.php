@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @if (Session::has('message'))
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ Session('message') }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('delete-message'))
                        <div class="control-group">
                            <div class="controls">
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ Session('delete-message') }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Data Barang</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('barang.create') }}" class="btn btn-sm btn-success pull-right">Tambah
                                Data</a>
                            <table id="example" class="table table-striped second">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Satuan</th>
                                        <th>Harga Modal</th>
                                        <th>Harga Jual Eceran</th>
                                        <th>Harga Jual Grosir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->barcode }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>@currency($item->harga_beli)</td>
                                            <td>@currency($item->harga_eceran)</td>
                                            <td>@currency($item->harga_grosir)</td>
                                            <td width="16%">
                                                <a href="{{ route('barang.edit', $item->id) }}" class="icon-edit">
                                                    Edit</a>
                                                <a href=""
                                                    onclick="if(confirm('APAKAH DATA INI INGIN ANDA HAPUS ???'))event.preventDefault(); document.getElementById('delete-{{ $item->id }}').submit();"
                                                    class="icon-trash"> Hapus</a>
                                                <form id="delete-{{ $item->id }}" method="post"
                                                    action="{{ route('barang.destroy', $item->id) }}"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
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
