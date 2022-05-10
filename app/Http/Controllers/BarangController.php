<?php

namespace App\Http\Controllers;

use App\Letak;
use App\Barang;
use App\Kategori;
use App\Stokperlokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('nama', 'ASC')->get();
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::orderBy('nama', 'ASC')->get();

        return view('admin.barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => 'required',
            "barcode" => 'required',
            "harga_modal" => 'required',
            "harga_eceran" => 'required',
        ]);

        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->barcode = $request->barcode;
        $barang->harga_beli = $request->harga_modal;
        $barang->satuan = $request->satuan;
        $barang->harga_eceran = $request->harga_eceran;
        $barang->id_kategori = $request->id_kategori;
        $barang->save();

        DB::table('barang');
        $id = DB::getPdo()->lastInsertId();

        $stok_gudang = new Stokperlokasi();
        $stok_gudang->id_letak = $request->id_letak;
        $stok_gudang->id_barang = $id;

        $stok_gudang->save();

        Session::flash('message', 'Data barang berhasil ditambahkan');
        return redirect()->route('barang.create');
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
    public function edit(Barang $barang)
    {
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        return view('admin.barang.edit', compact('kategori', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->nama = $request->nama;
        $barang->harga_beli = $request->harga_modal;
        $barang->harga_eceran = $request->harga_eceran;
        $barang->harga_grosir = $request->harga_grosir;
        $barang->id_kategori = $request->id_kategori;
        $barang->satuan = $request->satuan;
        $barang->save();

        Session::flash('message', 'Data Barang Berhasil diubah');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        Session::flash('delete-message', 'Data Barang berhasil dihapus');
        return redirect()->route('barang.index');
    }
    public function cari_jenis(Request $request){
        $id_jenis = $request->get('cari');
        $list = DB::table('set_harga_jual')->where('id_jenis',$id_jenis)->first();

        return response()->json($list);
    }

    // public function cari_barcode(Request $request){
    //     $id_jenis = $request->get('cari');
    //     $list = DB::table('set_harga_jual')->where('id_jenis',$id_jenis)->first();

    //     return response()->json($list);
    // }
}
