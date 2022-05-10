@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <h3>Penjualan Barang</h3>

			<a href="{{ route('penjualan.index') }}" class="btn btn-sm btn-info">Transaksi Selanjutnya</a>

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
                                        placeholder="Jenis Jual" value="GROSIR" readonly>
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
                                            <th style="width: 7%">ID</th>
                                            {{-- <th>Barcode</th> --}}
                                            <th style="width:20%">Nama Barang</th>
                                            <th style="width: 5%"></th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th style="width: 8%">Qty</th>
                                            <th>Satuan</th>
                                            <th>Sub Total</th>
                                            <th>HPP</th>
                                            <th>Total</th>
											<th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-form">
                                        <tr class="baris-data">
                                            <td style="width: 7%">
                                                <input type="text" placeholder="Kode Barang" class="form-control resize50 id-barang"
                                                    name="jual[0][id]" readonly>
                                            </td>
                                            <td style="width:20%">
                                                <input type="text" name="jual[0][nama]" class="form-control resize50 caribarang"
                                                    autocomplete="off" list="list-data" placeholder="Nama Barang">
                                            </td>
                                            <td width="5%">
                                                <button type="button" class="btn btn-sm btn-default resize50 clear-barang"
                                                    title="Hapus Nama Barang" style=""><i class="icon icon-refresh"
                                                        style="font-size: 10px;"></i></button>
                                            </td>
                                            <td>
                                                <input type="number" name="jual[0][harga_beli]"
                                                    class="form-control resize50 harga_beli" placeholder="Harga Beli">
                                            </td>
                                            <td>
                                                <input type="number" name="jual[0][harga_eceran]"
                                                    class="form-control resize50 harga_eceran" placeholder="Harga Eceran">
                                            </td>
                                            <td style="width: 8%">
                                                <input type="text" name="jual[0][qty]" class="form-control resize50 qty"
                                                    placeholder="Qty">
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
											<td></td>
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Total Keseluruhan</label>
                                            <input type="number" name="total_keseluruhan"
                                                class="form-control resize50 total-keseluruhan" placeholder="Jumlah Total" style="font-size: 25px;" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" style="text-align: right">
                                            <button type="button" id="tambah-input" class="btn btn-primary"><i
                                                    class="fas fa-cart-plus" style="font-size: 20px;"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="total_hpp">Total HPP</label>
                                    <input type="number" name="total_hpp" id="total_hpp" class="form-control total_hpp"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total_jual">Nominal</label>
                                    <input type="number" name="total_keseluruhan" id="total_keseluruhan"
                                        class="form-control total-keseluruhan" required>
                                </div>
                                <div class="form-group">
                                    <label for="bayar">Dibayarkan</label>
                                    <input type="number" name="bayar" id="bayar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="kembalian">Kembalian</label>
                                    <input type="number" name="kembalian" id="kembalian" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Simpan Transaksi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <datalist id="list-data">
                @foreach ($barang as $i)
                    <option class="datalist-barang" value="{{ $i->nama }}">{{ $i->barcode }}</option>
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
                    <td style="width: 7%"><input type="text" placeholder="Kode Barang" class="form-control resize50 id-barang" name="jual[' + jual + '][id]" readonly></td> \
                    <td style="width: 20%"><input type="text" name="jual[' + jual + '][nama]" class="form-control resize50 caribarang" autocomplete="off" list="list-data" placeholder="Nama Barang"></td> \
                    <td width="5%"><button type="button" class="btn btn-sm btn-default resize50 clear-barang" title="Hapus Nama Barang" style=""><i class="icon icon-refresh" style="font-size: 10px;"></i></button></td>\
                    <td><input type="number" name="jual[' + jual + '][harga_beli]" class="form-control resize50 harga_beli" placeholder="Harga Beli"></td> \
                    <td><input type="number" name="jual[' + jual + '][harga_eceran]" class="form-control resize50 harga_eceran" placeholder="Harga Jual"></td> \
                    <td style="width: 8%"><input type="text" name="jual[' + jual + '][qty]" class="form-control resize50 qty" required placeholder="Qty"></td> \
                    <td><input type="text" name="jual[' + jual + '][satuan]" class="form-control resize50 satuan" placeholder="Satuan" readonly></td> \
                    <td><input type="number" name="jual[' + jual + '][subtotal]" class="form-control resize50 subtotal" placeholder="Subtotal" readonly></td> \
                    <td><input type="number" name="jual[' + jual + '][hpp]" class="form-control resize50 hpp" placeholder="hpp" readonly></td> \
                    <td><input type="number" name="jual[' + jual + '][total]" class="form-control resize50 total" placeholder="Total" readonly></td> \
                    <td><button type="button" class="btn btn-sm btn-danger resize50 hapus-input" title="Hapus Baris"><i class="icon-trash"></i></button></td> \
                </tr> \
                '
            )
        })

        $(document).on('keyup', '.caribarang', function() {

            var barang = $(this).val().toLowerCase()
            var baris_b = $(this).parents('.baris-data')

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
                        baris_b.find('.harga_eceran').val(obj.harga_eceran)
                        baris_b.find('.id-barang').val(obj.id)
                        baris_b.find('.harga_beli').val(obj.harga_beli)
                        baris_b.find('.satuan').val(obj.satuan)
                    })
                },
                error: function(thrownError, ajaxOption, xhr) {

                }
            })
        })

        $(document).on('change', '.qty', function() {
            var qty = $(this).val();
            var baris_barang = $(this).parents('.baris-data');
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

        $(document).on('keyup', '#bayar', function() {
            var total = parseInt($('#bayar').val()) - parseInt($('.total_keseluruhan').val());
            $('#kembalian').val(total);
        })
        $(document).on('change', '#bayar', function() {
            var total = parseInt($('#bayar').val()) - parseInt($('.total_keseluruhan').val());
            $('#kembalian').val(total);
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

    </script>
@endsection
