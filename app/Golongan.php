<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table='golongan';
    protected $primaryKey='id';

    protected $fillable = [
        'golongan'
    ];
}
