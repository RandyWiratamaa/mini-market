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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <?php if ($cari == 'filter'): ?>
                                    <h2>Laporan Penjualan {{ $carijudul }} Dari {{ $data['dari'] }} Ke
                                        {{ $data['ke'] }}
                                    </h2>
                                    <?php else: ?>
                                    <h2>Laporan Penjualan {{ $carijudul }}</h2>
                                    <?php endif; ?>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="#"><i style="font-size: 15px"
                                                class="icon-calendar icon-white"></i> Filter Pencarian</a>
                                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span
                                                class="caret"></span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('report') }}?cari=semua">Semua</a>
                                            <a class="dropdown-item" href="{{ route('report') }}?cari=hariini">Hari
                                                Ini</a>
                                            <a class="dropdown-item" href="{{ route('report') }}?cari=bulanini">Bulan
                                                Ini</a>
                                            <a class="dropdown-item" href="{{ route('report') }}?cari=bulanlalu">Bulan
                                                Lalu</a>
                                            <a class="dropdown-item" href="{{ route('report') }}?cari=tahunini">Tahun
                                                Ini</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <h2>Pencarian berdasarkan tanggal</h2>
                                    <form action="{{ route('report') }}" action="get">
                                        <input type="hidden" name="cari" value="filter">
                                        <div class="form-group">
                                            <label for="firstname">Dari Tanggal</label>
                                            <input type="date" class="form-control" placeholder="Dari Tanggal" name="dari">
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">Ke Tanggal</label>
                                            <input type="date" class="form-control" placeholder="Dari Tanggal" name="ke">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-default tutup">Tutup</button>
                                            <button type="submit" class="btn btn-sm btn-warning">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table id="example" class="table table-striped second">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No. Nota</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th>HPP</th>
                                            <th>Laba</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php $laba_hariini = 0; ?>
                                        @foreach ($report_jual as $hariini)
                                            <?php $laba_hariini += $hariini->total_jual - $hariini->hpp; ?>
                                            <tr class="baris-data">
                                                <td>
                                                    <a href="{{ route('penjualan.detail', $hariini->nota_jual) }}"
                                                        class="text-primary">
                                                        {{ $hariini->nota_jual }}
                                                    </a>
                                                </td>
                                                <td>{{ $hariini->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                                <td>@currency($hariini->total_jual)</td>
                                                <td>@currency($hariini->hpp)</td>
                                                <td>
                                                    @currency($hariini->total_jual - $hariini->hpp)
                                                </td>
                                                <td>
                                                    <a href="{{ route('penjualan.cetak_nota', $hariini->nota_jual) }}"
                                                        target="_blank" class="icon-print text-danger"> Cetak Nota</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="6" style="text-align: right; font-weight:bold; font-size:20px; color:black">Untung Bersih</td>
                                        <td colspan="3" class="total-laba" style="font-weight:bold; font-size:20px; color:black;">
                                            <?php if ($cari == 'filter'): ?>
                                            Dari {{ $data['dari'] }} Ke
                                                {{ $data['ke'] }} : <em>@currency($laba_hariini)</em>
                                            <?php else: ?>
                                            {{ $carijudul }} : <em>@currency($laba_hariini)</em>
                                            <?php endif; ?>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                                <p><strong><em>NB : Klik No. Nota untuk melihat detail penjualan</em></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.filtercari').hide();
        $(document).ready(function() {
            $('.tombolfilter').click(function() {
                $('.filtercari').show();
            })
            $('.tutup').click(function() {
                $('.filtercari').hide();
            })

        })

    </script>
    <script>
        $(document).on('keyup', '.dataTables_wrapper .dataTables_filter input', function() {
            var nilai = 0;
            $('.baris-data').each(function() {
                var angka = parseInt($(this).find('.laba').val());
                nilai += angka
            })
            konver(nilai)
        })

        function konver(nilai) {
            bilangan = nilai;
            var number_string = bilangan.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            $('.total-laba').text("Rp. " + rupiah)
        }

    </script>


@endsection
