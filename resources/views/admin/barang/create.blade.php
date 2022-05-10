@extends('layouts.app');

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

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Tambah Data Barang</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang.store') }}" class="nedds-validation" method="POST">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col lg-8 col-md-8 col-sm-12 col-12">
                                        <div class="controls">
                                            <input type="hidden" class="span6" name="id_letak" value="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" class="form-control" id="barcode" name="barcode" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <select name="satuan" id="satuan" class="form-control">
                                                <option value="Unit">Unit</option>
                                                <option value="KTK">KTK</option>
												<option value="PAK">PAK</option>
												<option value="RTG">RTG</option>
                                                <option value="BTL">BTL</option>
                                                <option value="Butir">Butir</option>
                                                <option value="Buah">Buah</option>
                                                <option value="Biji">Biji</option>
                                                <option value="SCH">SCH</option>
                                                <option value="BKS">BKS</option>
                                                <option value="Roll">Roll</option>
                                                <option value="PCS">PCS</option>
                                                <option value="Box">Box</option>
                                                <option value="Meter">Meter</option>
                                                <option value="CM">CM</option>
                                                <option value="LTR">LTR</option>
                                                <option value="CC">CC</option>
                                                <option value="Milimeter">Mililiter</option>
                                                <option value="LSN">LSN</option>
                                                <option value="Gross">Gross</option>
                                                <option value="Kodi">Kodi</option>
                                                <option value="Rim">Rim</option>
                                                <option value="Dozen">Dozen</option>
                                                <option value="KLG">KLG</option>
                                                <option value="Lembar">Lembar</option>
                                                <option value="Helai">Helai</option>
                                                <option value="Gram">Gram</option>
                                                <option value="KG">KG</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori Barang</label>
                                            <select name="id_kategori" id="id_kategori" class="form-control">
                                                @foreach ($kategori as $kat)
                                                    <option value={{ $kat->id_kategori }}>{{ $kat->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Harga Modal</label>
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span
                                                        class="input-group-text">Rp </span></span>
                                                <input type="number" class="form-control" id="harga_modal"
                                                    name="harga_modal" placeholder="Harga Modal" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Harga Jual</label>
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span
                                                        class="input-group-text">Rp</span></span>
                                                <input type="number" class="form-control" id="harga_eceran"
                                                    name="harga_eceran" placeholder="Harga Jual" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group">
                                        <button class="btn btn-danger">Batal</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
