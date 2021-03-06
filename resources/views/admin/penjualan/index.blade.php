@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <h3 class="text-center"><legend>PENJUALAN BARANG</legend></h3>

            <div class="row mb-2">
                <a href="{{ route('penjualan.index') }}" class="btn btn-sm btn-info text-dark">Transaksi Selanjutnya</a>
            </div>

            <form action="#" target="__blank" method="post" class="needs-validation">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="nota_jual" id="nota_jual"
                                        value="{{ $no_nota }}">
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control set-today">
                                    <script type="text/javascript">
                                        window.onload = function() {
                                            document.querySelector('.set-today').value = (
                                                    new Date())
                                                .toISOString().substr(0, 10);
                                        }

                                    </script>
                                </div>
                                <div class="form-group">
                                    <select name="id_letak" id="id_letak" class="form-control" hidden="hidden">
                                        @foreach ($letak as $letak)
                                            <option hidden="hidden" value={{ $letak->id_letak }}>{{ $letak->letak }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="jenis_jual" id="jenis_jual" class="form-control"
                                        placeholder="Jenis Jual" value="Mini Market" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="responsive-table" style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width:60px;"></th>
                                            <th style="width:20%">Nama Barang</th>
                                            <th style="width:14%">Barcode</th>
                                            <th style="width: 5%"></th>
                                            <th style="width: 8%">Harga Beli</th>
                                            <th style="width: 8%">Harga Jual</th>
                                            <th style="width:50px">Qty</th>
                                            <th>Satuan</th>
                                            <th>Sub Total</th>
                                            <th>HPP</th>
                                            <th>Total</th>
											<th style="width: 5%">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-form">
                                        <tr class="baris-data">
                                            <td style="width:50px;">
                                                <input type="text" placeholder="Kode Barang" class="form-control resize50 id-barang"
                                                name="jual[0][id]" readonly>
                                            </td>
                                            <td style="width:20%">
                                                <input type="text" name="jual[0][nama]" class="form-control resize50 nama_barang"
                                                    autocomplete="off" list="list-data-nama" placeholder="Nama Barang">
                                            </td>
                                            <td style="width:14%">
                                                <input type="text" name="jual[0][barcode]" class="form-control resize50 barcode caribarang"
                                                    autocomplete="off" list="list-data" placeholder="Barcode">
                                            </td>
                                            <td width="5%">
                                                <button type="button" class="btn btn-sm btn-default resize50 clear-barang"
                                                    title="Hapus Nama Barang" style=""><i class="icon icon-refresh"
                                                        style="font-size: 10px;"></i></button>
                                            </td>
                                            <td style="width: 8%">
                                                <input type="number" name="jual[0][harga_beli]"
                                                    class="form-control resize50 harga_beli" placeholder="Harga Beli">
                                            </td>
                                            <td style="width: 8%">
                                                <input type="number" name="jual[0][harga_eceran]"
                                                    class="form-control resize50 harga_eceran" placeholder="Harga Eceran">
                                            </td>
                                            <td style="width:60px">
                                                <input type="number" name="jual[0][qty]" class="form-control resize50 qty"
                                                    placeholder="Qty" min="0">
                                            </td>
                                            <td>
                                                <input type="satuan" name="jual[0][satuan]" class="form-control resize50 satuan"
                                                    placeholder="Satuan" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="jual[0][subtotal]" class="form-control resize50 subtotal"
                                                    placeholder="Subtotal" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="jual[0][hpp]" class="form-control resize50 hpp"
                                                    placeholder="hpp" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="jual[0][total]" class="form-control resize50 total"
                                                    placeholder="Total" readonly>
                                            </td>
											<td style="width: 5%"></td>
                                        </tr>
                                    </tbody>
                                    {{-- <tr>
                                        <td colspan="2">
                                            <input type="number" name="total_keseluruhan"
                                                class="form-control resize50 total-keseluruhan" placeholder="Total" style="font-size: 40px;width:200px;height:150px;text-align:center;" readonly>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="8" style="text-align: right; width: 5%;">
                                            <button type="button" id="tambah-input" class="btn btn-primary">
                                                <i class="fas fa-cart-plus" title="Tambah Data" style="font-size: 20px;"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label style="font-size: 18px">Total Belanja</label>
                                    <input type="number" name="total_keseluruhan" class="form-control resize50 total-keseluruhan"
                                    placeholder="Total" style="font-size: 50px;width:300px;height:300px;text-align:center;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="total_hpp">Total HPP</label>
                                    <input type="number" name="total_hpp" id="total_hpp" class="form-control total_hpp resize50"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total_jual">Nominal</label>
                                    <input type="number" name="tagihan" id="tagihan"
                                        class="form-control tagihan resize75" required>
                                </div>
                                <div class="form-group">
                                    <label for="bayar">Dibayarkan</label>
                                    <input type="number" name="bayar" id="bayar" class="form-control bayar resize75" required>
                                </div>
                                <div class="form-group">
                                    <label for="kembalian">Kembalian</label>
                                    <input type="number" name="kembalian" id="kembalian" class="form-control kembalian resize75" required readonly>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Simpan Transaksi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <datalist id="list-data">
                @foreach ($barang as $i)
                    <option class="datalist-barang" value="{{ $i->barcode }}">{{ $i->nama }}</option>
                @endforeach
            </datalist>
            <datalist id="list-data-nama">
                @foreach ($barang as $i)
                    <option class="datalist-barang" value="{{ $i->nama }}">{{ $i->barang }}</option>
                @endforeach
            </datalist>
        </div>
    </div>


    <script>
        var list = $('#list-form')
        var jual = 0
        $('#tambah-input').click(function() {
            ++jual
            list.append(
                '<tr class="baris-data"> \
                    <td style="width: 50px"><input type="text" placeholder="Kode Barang" class="form-control resize50 id-barang" style="width:60px;" name="jual[' + jual + '][id]" readonly></td> \
                    <td style="width: 20%"><input type="text" name="jual[' + jual + '][nama]" class="form-control resize50 nama_barang" autocomplete="off" list="list-data-nama" placeholder="Nama Barang"></td> \
                    <td style="width: 14%"><input type="text" name="jual[' + jual + '][barcode]" class="form-control resize50 barcode caribarang" autocomplete="off" list="list-data" placeholder="Barcode"></td> \
                    <td width="5%"><button type="button" class="btn btn-sm btn-default resize50 clear-barang" title="Hapus Nama Barang" style=""><i class="icon icon-refresh" style="font-size: 10px;"></i></button></td>\
                    <td style="width: 8%"><input type="number" name="jual[' + jual + '][harga_beli]" class="form-control resize50 harga_beli" placeholder="Harga Beli"></td> \
                    <td style="width: 8%"><input type="number" name="jual[' + jual + '][harga_eceran]" class="form-control resize50 harga_eceran" placeholder="Harga Jual"></td> \
                    <td style="width:60px;"><input type="number" name="jual[' + jual + '][qty]" class="form-control resize50 qty" required placeholder="Qty" min="0"></td> \
                    <td><input type="text" name="jual[' + jual + '][satuan]" class="form-control resize50 satuan" placeholder="Satuan" readonly></td> \
                    <td><input type="number" name="jual[' + jual + '][subtotal]" class="form-control resize50 subtotal" placeholder="Subtotal" readonly></td> \
                    <td><input type="number" name="jual[' + jual + '][hpp]" class="form-control resize50 hpp" placeholder="hpp" readonly></td> \
                    <td><input type="number" name="jual[' + jual + '][total]" class="form-control resize50 total" placeholder="Total" readonly></td> \
                    <td style="width: 5%"><button type="button" class="btn btn-sm btn-danger resize50 hapus-input" title="Hapus Baris"><i class="icon-trash"></i></button></td> \
                </tr> \
                ')
        })

        $(document).on('keyup', '.caribarang', function() {

            var barang = $(this).val().toLowerCase()
            var baris_b = $(this).parents('.baris-data')
            var nama_barang = baris_b.find('.nama_barang');
            var harga_eceran = baris_b.find('.harga_eceran');
            var id_barang = baris_b.find('.id-barang');
            var harga_beli = baris_b.find('.harga_beli');
            var satuan = baris_b.find('.satuan');
            var qty = baris_b.find('.qty');
            var hpp = baris_b.find('.hpp');
            var subtotal = baris_b.find('.subtotal');
            var total = baris_b.find('.total');
            qty.val(1)
            $.ajax({
                url: "{{ route('cari') }}",
                dataType: 'JSON',
                type: 'GET',
                data: {
                    "cari": barang
                },
                success: function(data) {
                    $.each(data, function(index, obj) {
                        // alert(obj.barcode)
                        // console.log(obj.barcode)
                        if (baris_b.find('.caribarang').val() == '') {
                            $('#list-data option[value="' + barang + '"]').removeAttr(
                                'disabled');
                        } else {
                            $('#list-data option[value="' + barang + '"]').prop(
                                'disabled',
                                true);
                        }
                        nama_barang.val(obj.nama)
                        harga_eceran.val(obj.harga_eceran)
                        id_barang.val(obj.id_barang)
                        harga_beli.val(obj.harga_beli)
                        satuan.val(obj.satuan)
                        hpp.val(parseInt(qty.val()) * parseInt(harga_beli.val()))
                        subtotal.val(parseInt(qty.val()) * parseInt(harga_eceran.val()))
                        total.val(subtotal.val())
                        // console.log(parseInt(qty.val()) * parseInt(harga_beli.val()))
                        total_hpp()
                        mencari_total()
                    })
                },
                error: function(thrownError, ajaxOption, xhr) {

                }
            })
        })
        
        
        $(document).on('change', '.caribarang', function() {

            var barang = $(this).val().toLowerCase()
            var baris_b = $(this).parents('.baris-data')
            var nama_barang = baris_b.find('.nama_barang');
            var harga_eceran = baris_b.find('.harga_eceran');
            var id_barang = baris_b.find('.id-barang');
            var harga_beli = baris_b.find('.harga_beli');
            var satuan = baris_b.find('.satuan');
            var qty = baris_b.find('.qty');
            var hpp = baris_b.find('.hpp');
            var subtotal = baris_b.find('.subtotal');
            var total = baris_b.find('.total');
            qty.val(1)
            $.ajax({
                url: "{{ route('cari') }}",
                dataType: 'JSON',
                type: 'GET',
                data: {
                    "cari": barang
                },
                success: function(data) {
                    $.each(data, function(index, obj) {
                        // alert(obj.barcode)
                        // console.log(obj.barcode)
                        if (baris_b.find('.caribarang').val() == '') {
                            $('#list-data option[value="' + barang + '"]').removeAttr(
                                'disabled');
                        } else {
                            $('#list-data option[value="' + barang + '"]').prop(
                                'disabled',
                                true);
                        }
                        nama_barang.val(obj.nama)
                        harga_eceran.val(obj.harga_eceran)
                        id_barang.val(obj.id_barang)
                        harga_beli.val(obj.harga_beli)
                        satuan.val(obj.satuan)
                        hpp.val(parseInt(qty.val()) * parseInt(harga_beli.val()))
                        subtotal.val(parseInt(qty.val()) * parseInt(harga_eceran.val()))
                        total.val(subtotal.val())
                        // console.log(parseInt(qty.val()) * parseInt(harga_beli.val()))
                        total_hpp()
                        mencari_total()
                    })
                },
                error: function(thrownError, ajaxOption, xhr) {

                }
            })
        })
        

        $(document).on('keyup', '.nama_barang', function() {

            var barang = $(this).val().toLowerCase()
            var baris_b = $(this).parents('.baris-data')
            
            $.ajax({
                url: "{{ route('cari-nama') }}",
                dataType: 'JSON',
                type: 'GET',
                data: {
                    "cari": barang
                },
                success: function(data) {
                    $.each(data, function(index, obj) {
                        alert(obj.barcode)
                        // console.log(obj.barcode)
                        if (baris_b.find('.caribarang').val() == '') {
                            $('#list-data option[value="' + barang + '"]').removeAttr(
                                'disabled');
                        } else {
                            $('#list-data option[value="' + barang + '"]').prop(
                                'disabled',
                                true);
                        }
                        baris_b.find('.barcode').val(obj.barcode)
                        baris_b.find('.harga_eceran').val(obj.harga_eceran)
                        baris_b.find('.id-barang').val(obj.id)
                        baris_b.find('.harga_beli').val(obj.harga_beli)
                        baris_b.find('.satuan').val(obj.satuan)
                        total_hpp()
                        mencari_total()
                    })
                },
                error: function(thrownError, ajaxOption, xhr) {

                }
            })
        })

        $(document).on('input', '.qty', function() {
            var qty = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
            var nama = baris_barang.find('.nama');
            var harga_eceran = baris_barang.find('.harga_eceran');
            var subtotal = baris_barang.find('.subtotal');
            var harga_beli = baris_barang.find('.harga_beli');
            var hpp = baris_barang.find('.hpp');

            hpp.val(parseInt(qty) * parseInt(harga_beli.val()))
            subtotal.val(parseInt(qty) * parseInt(harga_eceran.val()))
            total_hpp()
            mencari_total()
        })

        $(document).on('change', '.qty', function() {
            var qty = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
            var nama = baris_barang.find('.nama');
            var harga_eceran = baris_barang.find('.harga_eceran');
            var subtotal = baris_barang.find('.subtotal');
            var harga_beli = baris_barang.find('.harga_beli');
            var hpp = baris_barang.find('.hpp');

            hpp.val(parseInt(qty) * parseInt(harga_beli.val()))
            subtotal.val(parseInt(qty) * parseInt(harga_eceran.val()))
            total_hpp()
            mencari_total()
        })

        $(document).on('keyup', '.qty', function() {
            var qty = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
            var diskon = baris_barang.find('.diskon');
            var nama = baris_barang.find('.nama');
            var harga_eceran = baris_barang.find('.harga_eceran');
            var subtotal = baris_barang.find('.subtotal');
            var total = baris_barang.find('.total');
            var harga_beli = baris_barang.find('.harga_beli');
            var hpp = baris_barang.find('.hpp');

            hpp.val(parseInt(qty) * parseInt(harga_beli.val()))
            subtotal.val(parseInt(qty) * parseInt(harga_eceran.val()))
            total.val(subtotal.val()) - (parseInt(diskon.val()))
            total_hpp()
            mencari_total()
        })

        $(document).on('input', '.qty', function() {
            var qty = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
            var diskon = baris_barang.find('.diskon');
            var nama = baris_barang.find('.nama');
            var harga_eceran = baris_barang.find('.harga_eceran');
            var subtotal = baris_barang.find('.subtotal');
            var total = baris_barang.find('.total');
            var harga_beli = baris_barang.find('.harga_beli');
            var hpp = baris_barang.find('.hpp');

            hpp.val(parseInt(qty) * parseInt(harga_beli.val()))
            subtotal.val(parseInt(qty) * parseInt(harga_eceran.val()))
            total.val(subtotal.val()) - (parseInt(diskon.val()))
            total_hpp()
            mencari_total()
        })

        $(document).on('change', '.diskon', function() {
            var diskon = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
            var subtotal = baris_barang.find('.subtotal');
            var total = baris_barang.find('.total');

            total.val(subtotal.val() - diskon)
            total_hpp()
            mencari_total()
            // laba()
        })

        $(document).on('keyup', '.diskon', function() {
            var diskon = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
            var subtotal = baris_barang.find('.subtotal');
            var total = baris_barang.find('.total');

            total.val(subtotal.val() - diskon)
            total_hpp()
            mencari_total()
            // laba()
        })


        $(document).on('change', '.total', function() {
            // var total = $(this).val();
            var baris_b = $(this).parents('.baris-data')
            // $.each(baris_b, function(index, obj){
            //     console.log(baris_b.find('.total'))
            // })
            console.log(baris_b.find('.total').val())
        })

        function mencari_total() {
            var angka = 0;
            var ppn = $('.ppn').val()
            var input_harga_ppn = $('.harga-ppn')
            var input_tagihan = $('.tagihan')
            $('.baris-data').each(function() {
                var cari_total = $(this).find('.total').val();
                angka += parseInt(cari_total);
            })
            // console.log(angka);
            $('.total-keseluruhan').val(angka)
            var harga_ppn = angka * ppn / 100
            var tagihan = angka
            // console.log(harga_ppn)
            input_harga_ppn.val(harga_ppn)
            input_tagihan.val(tagihan)
            // console.log(tagihan)
        }

        function total_hpp() {
            var nilai = 0;
            var total_hpp = $('.total_hpp')
            $('.baris-data').each(function() {
                var cari_total_hpp = $(this).find('.hpp').val();
                nilai += parseInt(cari_total_hpp)
            })
            // console.log(nilai)
            total_hpp.val(nilai)

        }

        $(document).on('keyup', '.bayar', function() {
            var total = parseInt($('.bayar').val())-parseInt($('.tagihan').val());
            $('.kembalian').val(total);
            // convert_kembalian(total)
        })
        $(document).on('change', '.bayar', function() {
            var total = parseInt($('.bayar').val())-parseInt($('.tagihan').val());
            $('.kembalian').val(total);
            // convert_kembalian(total)
        })

        $(document).on('click', '.clear-barang', function() {
            var brg = $(this).parents('.baris-data').find('.caribarang').val()
            $(this).parents('.baris-data').find('.caribarang').val('')
            if ($(this).parents('.baris-data').find('.caribarang').val() == '') {
                $('#list-data option[value="' + brg + '"]').removeAttr('disabled');
            }
        })

        $(document).on('click', '.hapus-input', function() {
            $(this).parents('.baris-data').remove()
            $('#datalist-total').val(parseInt($('#datalist-total').val()) + 2);
            if ($('#datalist-total').val() <= 0) {
                $('#tambah-input').prop('disabled', true)
            } else {
                $('#tambah-input').removeAttr('disabled')
            }

			total_hpp()
			mencari_total()
        })

        function convert_kembalian(nilai){
            bilangan = parseInt(nilai);
            var number_string = bilangan.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            $('.kembalian').val("Rp. "+rupiah)
        }

    </script>
@endsection
