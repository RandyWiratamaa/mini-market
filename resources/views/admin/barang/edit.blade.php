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
                            <h5 class="mb-0">Edit Data Barang</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/barang', $barang->id) }}" method="post" id="inputbarang"
                                class="nedds-validation">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="nama">Nama Obat</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $barang->nama }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="harga_modal">Harga Modal</label>
                                    <div class="input-group mb-3"><span class="input-group-prepend"><span
                                                class="input-group-text">Rp </span></span>
                                        <input type="number" class="form-control harga_modal" name="harga_modal"
                                            value="{{ $barang->harga_beli }}" required>
                                    </div>
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
                                            <option value={{ $kat->id_kategori }}>{{ $kat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="harga_eceran">Harga Jual</label>
                                    <div class="input-group mb-3"><span class="input-group-prepend"><span
                                                class="input-group-text">Rp </span></span>
                                        <input type="number" class="form-control harga_eceran" name="harga_eceran"
                                            id="harga_eceran" value="{{ $barang->harga_eceran }}">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-info">
                                        Update
                                    </button>
                                    <a class="btn" href="{{ route('barang.index') }}">Batal</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var grosir = 0;
            var langganan = 0;
            var umut = 0;

            $(document).ready(function() {
                var id_jenis = $('.id_jenis').val()
                console.log(id_jenis)
                $.ajax({
                    url: "{{ route('cari-jenis') }}",
                    type: 'GET',
                    dataType: 'JSON',
                    data: '&cari=' + id_jenis,
                    success: function(data) {
                        hitung(parseInt(data.h_grosir), parseInt(data.h_langganan), parseInt(data
                            .h_umum))
                        grosir = parseInt(data.h_grosir);
                        langganan = parseInt(data.h_langganan);
                        umum = parseInt(data.h_umum);
                    },
                    error: function(throwthrownError, ajaxOption, xhr) {
                        //
                    }
                })
            })

            $('.id_jenis').change(function() {
                var id_jenis = $(this).val()
                console.log(id_jenis)
                $.ajax({
                    url: "{{ route('cari-jenis') }}",
                    type: 'GET',
                    dataType: 'JSON',
                    data: '&cari=' + id_jenis,
                    success: function(data) {
                        hitung(parseInt(data.h_grosir), parseInt(data.h_langganan), parseInt(data
                            .h_umum))
                        grosir = parseInt(data.h_grosir);
                        langganan = parseInt(data.h_langganan);
                        umum = parseInt(data.h_umum);
                    },
                    error: function(throwthrownError, ajaxOption, xhr) {
                        //
                    }
                })
            })

            $(document).on('keyup', '.harga_modal', function() {
                if ($('.harga_modal').val() == '' || $('.harga_modal').val() == 0) {
                    $('.form-wajib').hide()
                } else {
                    $('.form-wajib').show()
                    hitung(grosir, langganan, umum)
                }
            })
            $(document).on('change', '.harga_modal', function() {
                if ($('.harga_modal').val() == '' || $('.harga_modal').val() == 0) {
                    $('.form-wajib').hide()
                } else {
                    $('.form-wajib').show()
                    hitung(grosir, langganan, umum)
                }
            })


            function hitung(grosir, langganan, umum) {
                var harga_modal = $('.harga_modal').val();

                var untung_grosir = harga_modal * grosir / 100;
                var untung_langganan = harga_modal * langganan / 100;
                var untung_umum = harga_modal * umum / 100;

                $('.harga_grosir').val(parseInt(harga_modal) + parseInt(untung_grosir));
                $('.harga_langganan').val(parseInt(harga_modal) + parseInt(untung_langganan));
                $('.harga_umum').val(parseInt(harga_modal) + parseInt(untung_umum));

            }

        </script>

        <!-- <script>
                                                                                                                                function keuntungan() {
                                                                                                                                    var grosir = document.getElementById("persen_grosir").value;
                                                                                                                                    var langganan = document.getElementById("persen_langganan").value;
                                                                                                                                    var umum = document.getElementById("persen_umum").value;

                                                                                                                                    var harga_modal = document.getElementById("harga_modal").value;

                                                                                                                                    var untung_grosir = harga_modal * grosir / 100;
                                                                                                                                    var untung_langganan = harga_modal * langganan / 100;
                                                                                                                                    var untung_umum = harga_modal * umum / 100;

                                                                                                                                    document.getElementById("harga_grosir").value = (parseInt(harga_modal)+parseInt(untung_grosir));
                                                                                                                                    document.getElementById("harga_langganan").value = (parseInt(harga_modal)+parseInt(untung_langganan));
                                                                                                                                    document.getElementById("harga_umum").value = (parseInt(harga_modal)+parseInt(untung_umum));
                                                                                                                                }

                                                                                                                                function goBack() {
                                                                                                                                    window.history.back();
                                                                                                                                }
                                                                                                                            </script> -->

    @endsection
