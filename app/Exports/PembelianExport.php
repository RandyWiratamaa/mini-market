<?php

namespace App\Exports;


use App\Pembelian;
// use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembelianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembelian::all();
    }

    // use Exportable;

    // public function view(): View
    // {
    //     return view('admin.pembelian.excel', [
    //         'pembelian' => Pembelian::all()
    //     ]);
    // }
}
