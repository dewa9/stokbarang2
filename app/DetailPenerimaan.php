<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenerimaan extends Model
{
    //
    public $timestamps = false;
    protected $table='detail_penerimaan_barang';
    protected $fillable = array('penerimaan_id','kd_barang','jumlah_penerimaan');

   public function relasi_penerimaan()
    {
    	return $this->hasManyThrough('App\Penerimaan','App\MasterBarangModel','kode_barang','penerimaan_id');
    }

   
}
