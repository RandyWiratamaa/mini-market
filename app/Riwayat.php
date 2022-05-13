<?php

namespace App;

use App\Barang;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
	protected $table = "riwayat";

    protected $fillable = [
    	'id',
    	'barang_id',
    	'nama',
    	'stok_akhir',
	];

	public function barang(){
		return $this->hasMany(Barang::class, 'barang_id' , 'id');
	}

    public function letak_barang(){
		return $this->hasMany(Letak::class, 'letak_id' , 'id_letak');
	}

    public function user(){
		return $this->hasMany(User::class, 'user_id' , 'id');
	}
}

