<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarangModel extends Model
{
    //
     //
    public $timestamps = false;
    protected $table='masterbarang';
    protected $primaryKey='kode_barang';
    protected $fillable = array('kode_barang', 'nama_barang', 'jumlah_barang','satuan','keterangan');

    public function relasi_to_detail_penerimaan(){
    	return $this->hasMany('App\DetailPenerimaan','kode_barang');
    }
}
