<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    //
     public $timestamps = false;
    protected $table='masterbarang';
    protected $primaryKey='id';
    protected $fillable = array('id', 'nama_barang', 'jumlah_barang','satuan','keterangan');

    public function relasi_detail_penerimaan(){
    	return $this->hasMany('App\DetailPenerimaan');
    }

    public function relasi_master_detail_penerimaan()
    {
    	return $this->hasManyThrough('App\Penerimaan','App\DetailPenerimaan','master_barang_id','penerimaan_id');
    }

}
