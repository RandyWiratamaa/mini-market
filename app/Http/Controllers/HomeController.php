<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Stokperlokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_barang = DB::table('barang')->count();
        $now = now()->format('Y-m-d');
        $penjualan = DB::table('penjualan')->whereDate('created_at', $now)->sum('total_jual');
        $hpp = DB::table('penjualan')->whereDate('created_at', $now)->sum('hpp');
        $habis_stok = Stokperlokasi::orderBy('stok_per_lokasi.stok', 'DESC')
                        ->join('barang', 'barang.id', '=', 'stok_per_lokasi.id_barang')
                        ->join('letak_barang', 'letak_barang.id_letak', '=', 'stok_per_lokasi.id_letak')
                        ->where('stok_per_lokasi.stok', '<=', 50)
                        ->get();
        $jualbyday = DB::table('detail_jual')
                        ->select('barang.nama', DB::raw('sum(detail_jual.jml_jual) as jml_jual'))
                        ->join('barang', 'barang.id', '=', 'detail_jual.barang_id')
                        ->groupBy('barang.nama')
                        ->whereDate('detail_jual.created_at', Carbon::today())
                        ->get();
        // dd($jualbyday);
        $year = now()->format('Y');
        return view('home', compact('total_barang', 'penjualan', 'habis_stok', 'hpp', 'jualbyday'));
    }
}
