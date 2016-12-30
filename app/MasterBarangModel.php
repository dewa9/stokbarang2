<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarangModel extends Model
{
    //
     //
    public $timestamps = false;
    protected $table='masterbarang';
    protected $fillable = array('kode_barang', 'nama_barang', 'jumlah_barang','satuan','keterangan');
}
