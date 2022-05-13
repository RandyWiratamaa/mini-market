@extends('layouts.app')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col=-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">UPDATE STOK BARANG</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('opname.store') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"
                                        name="tanggal" id="tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="id_letak">Lokasi Opname</label>
                                    <select name="id_letak" id="id_letak"
                                        class="form-control col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        @foreach ($letak as $letak)
                                            <option value={{ $letak->id_letak }}>{{ $letak->letak }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_letak">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" required>
                                </div>
                                <table class="responsive-table mt-4" style="width:100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Real</th>
                                            <th class="hidden">Kode Barang</th>
                                            <th colspan="2" width="25%">Barang</th>
                                            <th width="5%"></th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Selisih</th>
                                            <th>Lebih</th>
                                            <th>Nominal Selisih</th>
                                            <th>Nominal Lebih</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-form">
                                        <tr class="baris-data">
                                            <td>
                                                <input type="number" placeholder="Stok Real" class="form-control real_stok"
                                                    name="angka[0][real]">
                                            </td>
                                            <td class="hidden"><input type="text" placeholder="Kode Barang"
                                                    class="form-control id-barang" name="angka[0][id]" readonly></td>
                                            <td width="25%">
                                                <input name="angka[0][nama]" type="text" autocomplete="off" list="list-data"
                                                    class="form-control caribarang" placeholder="Nama Barang">
                                            </td>
                                            <td width="5%">
                                                <button type="button" class="btn btn-sm btn-default clear-barang"
                                                    title="Hapus Nama Barang" style=""><i class="icon icon-refresh"
                                                        style="font-size: 10px;"></i></button>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control harga-beli" name="angka[0][harga_beli]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control stok" name="angka[0][stok]" value="0">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control harga-selisih" name="angka[0][selisih]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control harga-lebih" name="angka[0][lebih]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control nominal-selisih"
                                                    name="angka[0][nominal_selisih]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control nominal-lebih"
                                                    name="angka[0][nominal_lebih]">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                        <tr style="margin-top: 20px;">
                                            <td colspan="8" style="text-align: right">
                                                <button type="button" id="tambah-input" class="btn btn-primary">+</button>
                                                <button type="submit" class="btn">Simpan</button>
                                            </td>
                                        </tr>
                                </table>
                            </form>

                            <input type="hidden" id="datalist-total" value="{{ $total_barang }}">
                            <!-- {{ $total_barang }} -->
                            <datalist id="list-data">
                                @foreach ($barang as $i)
                                    <option class="datalist-barang" value="{{ $i->nama }}">{{ $i->nama }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('.real_stok').attr('readonly', 'true')
                $('.stok').attr('readonly', 'true')
                $('.harga-beli').attr('readonly', 'true')
                $('.harga-selisih').attr('readonly', 'true')
                $('.harga-lebih').attr('readonly', 'true')
                $('.nominal-selisih').attr('readonly', 'true')
                $('.nominal-lebih').attr('readonly', 'true')
                var list = $('#list-form')
                var angka = 0
                $('#tambah-input').click(function() {
                    ++angka
                    list.append(
                        " <tr class='baris-data'>\
                            <td><input type='number' placeholder='Stok Real' class='form-control real_stok' name='angka[" +angka +"][real]' readonly='true'></td> \
                            <td><input type='text' placeholder='ID Obat' class='form-control id-barang' name='angka[" +angka +"][id]' readonly> </td>\
                            <td width='25%'><input name='angka[" +angka +"][nama]' type='text' autocomplete='off' list='list-data' class='form-control caribarang' placeholder='Nama Obat'></td>\
                            <td width='5%'><button type='button' class='btn btn-sm btn-default clear-barang' title='Hapus Nama Barang'><i class='icon icon-refresh' style='font-size:10px'></i></button></td>\
                            <td><input type='number' placeholder='Harga Beli' class='form-control harga-beli' name='angka[" +angka +"][harga_beli]'></td> \
                            <td><input type='number' placeholder='Stok' class='form-control stok' name='angka[" +angka +"][stok]' value='0' required></td> \
                            <td><input type='text' class='form-control harga-selisih' name='angka[" +angka +"][selisih]' placeholder='Selisih'></td> \
                            <td><input type='text' class='form-control harga-lebih' name='angka[" +angka +"][lebih]' placeholder='Lebih'></td> \
                            <td><input type='text' class='form-control nominal-selisih' name='angka[" +angka +"][nominal_selisih]' placeholder='nominal_selisih'></td> \
                            <td><input type='text' class='form-control nominal-lebih' name='angka[" +angka + "][nominal_lebih]' placeholder='nominal_lebih'></td> \
                            <td><button type='button' class='btn btn-sm btn-danger hapus-input' title='Hapus Baris'><i class='icon-trash' style='font-size:10px'></i></button></td> \
                            </tr> \
                            ")
                    $('.stok').attr('readonly', 'true')
                    $('.harga-beli').attr('readonly', 'true')
                    $('.harga-selisih').attr('readonly', 'true')
                    $('.harga-lebih').attr('readonly', 'true')
                    $('.nominal-selisih').attr('readonly', 'true')
                    $('.nominal-lebih').attr('readonly', 'true')
                    $('#datalist-total').val($('#datalist-total').val() - 2);
                    if ($('#datalist-total').val() <= 0) {
                        $('#tambah-input').prop('disabled', true)
                    } else {
                        $('#tambah-input').removeAttr('disabled')
                    }

                })
                // $('.caribarang').keyup(function(){
                //         $.ajax({
                //             url:"{{ route('cari') }}",
                //             dataType:'JSON',
                //             type:'GET',
                //             data:"&cari="+$(this).val(),
                //             success:function(data){
                //                 $.each(data, function(index, obj){
                //                     alert(obj.nama)
                //                 })
                //             },
                //             error:function(thrownError,ajaxOption,xhr){
                //                 alert('error cok ')
                //             }
                //         })
                //     })
                // $('#list-form').on('keyup','.caribarang',function(){
                //     $barang = $(this).val()
                //     console.log($barang)
                // })

                $(document).on('keyup', '.caribarang', function() {
                    var barang = $(this).val().toLowerCase()
                    var baris_b = $(this).parents('.baris-data');
                    $.ajax({
                        url: "{{ route('cari-nama') }}",
                        dataType: 'JSON',
                        type: 'GET',
                        data: {
                            "cari": barang
                        },
                        success: function(data) {
                            // $.each(data.a, function(index, obj){
                            //     // alert(obj.id)
                            //     if(baris_b.find('.caribarang').val() == ''){
                            //         $('#list-data option[value="'+barang+'"]').removeAttr('disabled');
                            //     }else{
                            //         $('#list-data option[value="'+barang+'"]').prop('disabled',true);
                            //     }
                            //     baris_b.find('.harga-beli').val(obj.harga_beli)
                            //     if(obj.stok_akhir){
                            //         baris_b.find('.stok').val(obj.stok_akhir)
                            //     }else{
                            //         baris_b.find('.stok').val(obj.stok_minimal)
                            //     }
                            //     // baris_b.find('.stok').val(obj.stok_minimal)
                            //     baris_b.find('.id-barang').val(obj.id)
                            //     baris_b.find('.real_stok').removeAttr('readonly')
                            // })
                            $.each(data, function(index, obj) {
                                if (baris_b.find('.caribarang').val() == '') {
                                    $('#list-data option[value="' + barang + '"]').removeAttr(
                                        'disabled');
                                } else {
                                    $('#list-data option[value="' + barang + '"]').prop(
                                        'disabled', true);
                                }
                                baris_b.find('.harga-beli').val(obj.harga_beli)
                                baris_b.find('.stok').val(obj.stok)
                                // baris_b.find('.stok').val(obj.stok_minimal)
                                baris_b.find('.id-barang').val(obj.id)
                                baris_b.find('.real_stok').removeAttr('readonly')
                            })
                            // $.each(data.riwayat, function(index, obj){
                            //     console.log(obj.stok_akhir)
                            // })
                        },
                        error: function(thrownError, ajaxOption, xhr) {
                            // console.log('error cok ')
                        }
                    })
                })

                $(document).on('change', '.caribarang', function() {
                    var barang = $(this).val().toLowerCase()
                    var baris_b = $(this).parents('.baris-data');
                    $.ajax({
                        url: "{{ route('cari-nama') }}",
                        dataType: 'JSON',
                        type: 'GET',
                        data: {
                            "cari": barang
                        },
                        success: function(data) {
                            $.each(data, function(index, obj) {
                                // alert(obj.stok)
                                // console.log(obj.nama)
                                if (baris_b.find('.caribarang').val() == '') {
                                    $('#list-data option[value="' + barang + '"]').removeAttr(
                                        'disabled');
                                } else {
                                    $('#list-data option[value="' + barang + '"]').prop(
                                        'disabled', true);
                                }
                                baris_b.find('.harga-beli').val(obj.harga_beli)
                                baris_b.find('.stok').val(obj.stok)
                                baris_b.find('.id-barang').val(obj.id)
                                baris_b.find('.real_stok').removeAttr('readonly')
                            })
                        },
                        error: function(thrownError, ajaxOption, xhr) {
                            // alert('error cok ')
                        }
                    })
                })

                $(document).on('change', '.real_stok', function() {
                    var real = parseInt($(this).val());
                    var baris_barang = $(this).parents('.baris-data');
                    var stok = parseInt(baris_barang.find('.stok').val());
                    var harga_beli = baris_barang.find('.harga-beli');
                    var harga_lebih = baris_barang.find('.harga-lebih');
                    var harga_selisih = baris_barang.find('.harga-selisih');
                    var nominal_lebih = baris_barang.find('.nominal-lebih');
                    var nominal_selisih = baris_barang.find('.nominal-selisih');
                    if (real > stok) {
                        harga_lebih.val(real - stok)
                        nominal_lebih.val(parseInt(harga_lebih.val()) * parseInt(harga_beli.val()))
                        harga_selisih.val(0)
                        nominal_selisih.val(0)
                        // console.log($('.harga-lebih').val(real-stok);
                    } else {
                        harga_selisih.val(stok - real);
                        nominal_selisih.val(harga_selisih.val() * harga_beli.val())
                        harga_lebih.val(0)
                        nominal_lebih.val(0)
                        // console.log($('.harga-selisih').val(stok-real);
                    }
                })

                $(document).on('keyup', '.real_stok', function() {
                    var real = parseInt($(this).val());
                    var baris_barang = $(this).parents('.baris-data');
                    var stok = parseInt(baris_barang.find('.stok').val());
                    var harga_beli = baris_barang.find('.harga-beli');
                    var harga_lebih = baris_barang.find('.harga-lebih');
                    var harga_selisih = baris_barang.find('.harga-selisih');
                    var nominal_lebih = baris_barang.find('.nominal-lebih');
                    var nominal_selisih = baris_barang.find('.nominal-selisih');
                    if (real > stok) {
                        harga_lebih.val(real - stok)
                        nominal_lebih.val(parseInt(harga_lebih.val()) * parseInt(harga_beli.val()))
                        harga_selisih.val(0)
                        nominal_selisih.val(0)
                        // console.log($('.harga-lebih').val(real-stok);
                    } else {
                        harga_selisih.val(stok - real);
                        nominal_selisih.val(harga_selisih.val() * harga_beli.val())
                        harga_lebih.val(0)
                        nominal_lebih.val(0)
                        // console.log($('.harga-selisih').val(stok-real);
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
                })
                $(document).on('click', '.clear-barang', function() {
                    var brg = $(this).parents('.baris-data').find('.caribarang').val()
                    $(this).parents('.baris-data').find('.caribarang').val('')
                    if ($(this).parents('.baris-data').find('.caribarang').val() == '') {
                        $('#list-data option[value="' + brg + '"]').removeAttr('disabled');
                    }
                })

            </script>
        @endsection
