<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenerimaan extends Model
{
    //
    public $timestamps = false;
    protected $table='detail_penerimaan_barang';
    protected $fillable = array('penerimaan_id','master_barang_id','jumlah_penerimaan');

   public function relasi_penerimaan()
    {
    	return $this->hasMany('App\Penerimaan','id','penerimaan_id');
    }

    public function relasi_master()
    {
    	return $this->belongsTo('App\MasterBarang','master_barang_id');
    }

     public function relasi_master_detail_penerimaan()
    {
        return $this->belongsToMany('App\MasterBarang');
    }
    
   
}
