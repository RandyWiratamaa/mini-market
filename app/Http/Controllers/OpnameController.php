<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Letak;
use App\Riwayat;
use App\Barang;
use App\Opname;
use App\Stokgudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $barang = Barang::orderBy('nama', 'ASC')->get();
        $letak = Letak::orderBy('id_letak', 'ASC')->get();
        $total_barang = Barang::orderBy('nama', 'ASC')->count();
        return view('admin.opname.index', compact('barang', 'letak', 'total_barang'));
    }
    public function loaddata(Request $request)
    {
        $cari = $request->input('cari');
        
        $data_id = DB::table('barang')->where('nama',$cari)->first();
        $cari_riwayat = DB::table('riwayat')->where('barang_id',$data_id->id)->get();
        
        if(count($cari_riwayat) === 0){
        
            $data = DB::select('select * from barang where id = ? limit 1', [$data_id->id]);
        }else{
            $data = DB::select('select barang.*,riwayat.stok_akhir as stok,riwayat.barang_id from barang join riwayat on barang.id = riwayat.barang_id where riwayat.barang_id = ? order by riwayat.barang_id DESC limit 1', [$data_id->id]);
        }

        return response()->json($data);
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
        $cek_stok_akhir = $request->stok;
        
        $request->validate([
            'angka.*.real'=>'required'
        ]);
        foreach ($request->angka as $key => $value) {
                $id_barang = $value['id'];
                
            DB::table('riwayat')->insert([
                'barang_id'=>$value['id'],
                'stok_awal'=>$value['stok'],
                'stok_akhir'=>$value['real'],
                'masuk'=>$value['real'],
                'keluar'=>0,
                'bagian'=>'Opname',
                'aksi'=>'Simpan',
                'letak_id'=>$request->id_letak,
                'user_id'=>Auth::id(),
            ]);
            DB::table('stok_per_lokasi')->where(['id_barang'=>$value['id'],'id_letak'=>$request->id_letak])->update(['stok'=>$value['real']]);
        }
        
        return redirect()->route('opname.index');
        
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
}
