<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return response()->redirectTo('/login');
});
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/jenis', 'JenisController@index')->name('jenis');

// Route::get('/addbarang', 'BarangController@create')->name('addbarang');

// Route::post('/addbarang', 'BarangController@store')->name('addbarang.store');

// // Route::get('dropdownlist', 'BarangController@getJenis');

// // Route::get('dropdownlist/getJenis/{id_jenis}', 'BarangController@getJenis');

// Route::get('/sethargajual', 'SetpersentasejualController@index')->name('sethargajual');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('home', 'HomeController');
    Route::resource('barang', 'BarangController');
    Route::resource('set_harga_jual', 'SethargajualController');
    Route::resource('satuan', 'SatuanController');
    Route::resource('opname', 'OpnameController');
    Route::resource('golongan', 'GolonganController');
    Route::get('cari', 'OpnameController@loaddata')->name('cari');
    Route::get('cari-jenis', 'BarangController@cari_jenis')->name('cari-jenis');
    Route::get('cari-supplier', 'PembelianController@loaddata')->name('carisupplier');
    Route::resource('riwayat', 'RiwayatController');
    Route::resource('stok', 'StokperlokasiController');
    Route::resource('penjualan', 'PenjualanController')->except(['show','destroy']);
    Route::resource('eceran', 'EceranController')->except(['show','destroy']);
    Route::resource('pembelian', 'PembelianController')->except(['show','destroy']);
    
    // modul penjualan
    Route::get('report', 'PenjualanController@report')->name('report');
    Route::get('retur-jual', 'PenjualanController@retur')->name('retur-penjualan');
    Route::get('retur-jual/{no}', 'PenjualanController@hapus')->name('retur-penjualan-destroy');
    Route::get('/penjualan/{penjualan}/detail', 'PenjualanController@detail')->name('penjualan.detail');
    Route::get('/penjualan/{penjualan}/cetak', 'PenjualanController@cetak_nota')->name('penjualan.cetak_nota');
    Route::get('/penjualan/export_excel', 'PenjualanController@export_excel')->name('penjualan.export_excel');
    // modul pembelian
    Route::get('report-beli', 'PembelianController@report')->name('report-beli');
    Route::get('beli-kredit', 'PembelianController@kredit')->name('beli-kredit');
    Route::get('retur-beli', 'PembelianController@retur')->name('retur-pembelian');
    Route::get('retur-beli/{no}', 'PembelianController@hapus')->name('retur-pembelian-destroy');
    Route::get('/pembelian/{pembelian}/cetak', 'PembelianController@cetak_nota')->name('pembelian.cetak_nota');
    Route::get('/pembelian/{pembelian}/detail', 'PembelianController@detail')->name('pembelian.detail');
    Route::get('/pembelian/export_excel', 'PembelianController@export_excel')->name('pembelian.export_excel');

    // modul mutasi masuk
    Route::get('report-mutasi-masuk', 'MutasiMasukController@report')->name('report-mutasi-masuk');
    Route::get('/report-mutasi-masuk/{mutasi_masuk}/detail', 'MutasiMasukController@detail')->name('mutasi_masuk.detail');
    Route::get('/report-mutasi-masuk/{mutasi_masuk}/cetak', 'MutasiMasukController@cetak_nota')->name('mutasi_masuk.cetak_nota');
    // modul mutasi keluar
    Route::get('report-mutasi-keluar', 'MutasiKeluarController@report')->name('report-mutasi-keluar');
    Route::get('/report-mutasi-keluar/{mutasi_keluar}/detail', 'MutasiKeluarController@detail')->name('mutasi_keluar.detail');
    Route::get('/report-mutasi-keluar/{mutasi_keluar}/cetak', 'MutasiKeluarController@cetak_nota')->name('mutasi_keluar.cetak_nota');

    Route::resource('mutasi_masuk', 'MutasiMasukController');
    Route::resource('mutasi_keluar', 'MutasiKeluarController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('akun', 'AkunController');
    Route::resource('rekening_tahun', 'RekeningtahunController');

    Route::resource('konfigurasi', 'KonfigurasiController');


});