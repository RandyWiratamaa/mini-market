<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stokperlokasi extends Model
{
    protected $table = "stok_per_lokasi";

    protected $fillable = [
        'id_barang',
        'id_letak',
        'stok'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
