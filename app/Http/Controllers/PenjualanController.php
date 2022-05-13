<?php

namespace App\Http\Controllers;

use App\Ppn;
use App\Letak;
use App\Barang;
use App\Penjualan;
use App\Detailpenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppn = Ppn::orderBy('ppn', 'ASC')->first();
        $letak = Letak::orderBy('letak', 'ASC')->get();
        $barang = Barang::orderBy('nama', 'ASC')->get();


        $now = now()->format('dmY');
        //Set Nota Jual
        $nota_jual = 'JUAL';
        $tgl = now()->format('Y-m-d');
        $nota_tgl = now()->format('dmY');
        $clock = now()->format('his');
        $data = DB::table('penjualan')->whereDate('created_at', $tgl)->count();
        $angka = $data+1;

        // die($nota_tgl);

        // mengambil nota jual
        $no_nota = 'AM'.$nota_tgl.$clock.$angka;

        return view('admin.penjualan.index', compact('letak','barang','ppn', 'angka', 'no_nota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->jual as $key => $value){
            $id_barang = $value['id'];

            DB::table('detail_jual')->insert([
                'nota_jual' => $request->nota_jual,
                'barang_id' => $value['id'],
                'jml_jual' => $value['qty'],
                'harga_jual' => $value['harga_eceran'],
                'subtotal' => $value['subtotal'],
                'total_jual' => $value['total'],
            ]);
            $cari_stok = DB::table('stok_per_lokasi')->where(['id_barang'=>$value['id'],'id_letak'=>$request->id_letak])->first();

            DB::table('riwayat')->insert([
                'no_faktur' => $request->nota_jual,
                'barang_id' => $value['id'],
                'stok_awal' => $cari_stok->stok,
                'stok_akhir' => $cari_stok->stok-$value['qty'],
                'masuk' => 0,
                'keluar' => $value['qty'],
                'tanggal' => now(),
                'bagian' => 'Penjualan',
                'user_id'=>Auth::id(),
                'letak_id' => $request->id_letak,
                'aksi' => 'Simpan'
            ]);
            $cari_stok = DB::table('stok_per_lokasi')->where(['id_barang'=>$value['id'],'id_letak'=>$request->id_letak])->update(['stok'=>$cari_stok->stok-$value['qty']]);
        }

        DB::table('penjualan')->insert([
            'nota_jual'     => $request->nota_jual,
            'letak_id'      => $request->id_letak,
            'total_jual'    => $request->total_keseluruhan,
            'hpp'           => $request->total_hpp,
            'bayar'         => $request->bayar,
            'kembalian'     => $request->kembalian,
            'jenis_jual'    => $request->jenis_jual,
            'created_at'    => $request->tanggal,
            // 'cara_bayar'    => $request->cara_bayar ? 1 : 0
        ]);

        Session::flash('message', 'Data Penjualan berhasil ditambahkan');
        return redirect('admin/penjualan/'.$request->nota_jual.'/cetak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function report(Request $request)
    {
        $cari = $request->get('cari');
        $now = now()->format('Y-m-d');
        $month = now()->format('m');
        $year = now()->format('Y');
        $lastmonth = now()->format('m')-1;
        $data['a'] = 0;
        if($cari == 'semua'){
            $carijudul = 'Semua';
            $report_jual = Penjualan::orderBy('created_at', 'DESC')->get();
        }elseif($cari == 'bulanini'){
            $carijudul = 'Bulan Ini';
            $report_jual = Penjualan::orderBy('created_at', 'DESC')->whereMonth('created_at', $month)->get();
        }elseif($cari == 'bulanlalu'){
            // dd($cari);
            $carijudul = 'Bulan Lalu';
            $report_jual = Penjualan::orderBy('created_at', 'DESC')->whereMonth('created_at', $lastmonth)->get();
        }elseif($cari == 'tahunini'){
            $carijudul = 'Tahun Ini';
            $report_jual = Penjualan::orderBy('created_at', 'DESC')->whereYear('created_at', $year)->get();
        }elseif($cari == 'hariini'){
            $carijudul = 'Hari Ini';
            $report_jual = Penjualan::orderBy('created_at', 'DESC')->where('created_at', $now)->get();
        }elseif($cari == 'filter'){
            $carijudul = 'Filter Pencarian';
            $dari = $request->get('dari');
            $ke = $request->get('ke');
            $data['dari'] = $request->get('dari');
            $data['ke'] = $request->get('ke');
            $report_jual = Penjualan::orderBy('created_at', 'DESC')->whereBetween('created_at', [$dari,$ke])->get();
        }else{
            $carijudul = 'Hari Ini';
            $report_jual = Penjualan::orderBy('nota_jual', 'DESC')->where('created_at', $now)->get();
        }

        return view('admin.penjualan.report', compact('report_jual','data','carijudul','cari'));
    }

    public function FilterReport(Request $request){

    }

    public function detail(Penjualan $penjualan)
    {

        $detail_jual = Detailpenjualan::orderBy('nota_jual', 'ASC')
                        ->join('penjualan', 'penjualan.nota_jual', '=', 'detail_jual.nota_jual')
                        ->join('barang', 'barang.id', '=', 'detail_jual.barang_id')
                        ->select('detail_jual.nota_jual', 'barang.nama', 'barang.harga_beli', 'detail_jual.jml_jual', 'detail_jual.harga_jual', 'detail_jual.subtotal', 'detail_jual.diskon', 'detail_jual.total_jual')
                        ->where('detail_jual.nota_jual', $penjualan->nota_jual)
                        ->get();
        return view('admin.penjualan.detail', compact('penjualan', 'detail_jual'));
    }

    public function cetak_nota(Penjualan $penjualan)
    {
        $config = DB::table('konfigurasi')->first();
        $today = Carbon::now()->isoFormat('d MMMM Y');
        $detail_jual = Detailpenjualan::orderBy('nota_jual', 'ASC')
                            ->join('penjualan', 'penjualan.nota_jual', '=', 'detail_jual.nota_jual')
                            ->join('barang', 'barang.id', '=', 'detail_jual.barang_id')
                            ->select('detail_jual.nota_jual', 'barang.nama', 'barang.harga_beli', 'detail_jual.jml_jual', 'detail_jual.harga_jual', 'detail_jual.subtotal', 'detail_jual.diskon', 'detail_jual.total_jual', 'barang.satuan')
                            ->where('detail_jual.nota_jual', $penjualan->nota_jual)
                            ->get();
        $ppn = DB::table('set_ppn_jual')->first();
        $judul = "Nota Penjualan ".$penjualan->nota_jual;
        return view('admin.penjualan.nota', compact('penjualan','judul', 'detail_jual','ppn','today','config'));
    }

    public function retur(Request $request){
        $cari = $request->get('cari');
        $now = now()->format('Y-m-d');
        $year = now()->format('Y');
        $month = now()->format('m');
        $lastmonth = now()->format('m')-1;
        $data['a'] = 0;
        if($cari == 'semua'){
            $carijudul = 'Semua';
            $list_data = Penjualan::orderBy('created_at','DESC')->get();

        }elseif($cari == 'hariini'){
            $carijudul = 'Hari Ini';
            $list_data = Penjualan::orderBy('created_at','DESC')->where('created_at',$now)->get();

        }elseif($cari == 'bulanini'){
            $carijudul = 'Bulan Ini';
            $list_data = Penjualan::orderBy('created_at','DESC')->where('created_at',$month)->get();

        }elseif($cari == 'bulanlalu'){
            $carijudul = 'Bulan Lalu';
            $list_data = Penjualan::orderBy('created_at','DESC')->whereMonth('created_at',$lastmonth)->get();

        }elseif($cari == 'tahunini'){
            $carijudul = 'Tahun Ini';
            $list_data = Penjualan::orderBy('created_at','DESC')->whereYear('created_at',$year)->get();

        }elseif($cari == 'filter'){
            $carijudul = 'Filter';
            $data['dari'] = $request->get('dari');
            $data['ke'] = $request->get('ke');
            $list_data = Penjualan::orderBy('created_at','DESC')->whereBetween('created_at',[$data['dari'],$data['ke']])->get();

        }else{
            $carijudul = 'Hari Ini';
            $list_data = Penjualan::orderBy('created_at','DESC')->where('created_at',$now)->get();

        }
        return view('admin.penjualan.retur', compact('list_data','cari','carijudul','data'));
    }

    public function hapus($no){
        $list = Detailpenjualan::join('stok_per_lokasi', 'stok_per_lokasi.id_barang', '=', 'detail_jual.barang_id')
                        ->select('detail_jual.*','stok_per_lokasi.stok')
                        ->where('detail_jual.nota_jual',$no)
                        ->get();
        foreach ($list as $key) {
            $barang = DB::table('stok_per_lokasi')->where('id_barang',$key->barang_id)->update(['stok'=>$key->stok+$key->jml_jual]);
        }
        Penjualan::where('nota_jual',$no)->delete();
        Session::flash('delete-message', 'Berhasil diretur');
        return redirect()->route('retur-penjualan');
    }

}
