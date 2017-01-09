<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_PenerimaanModel extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey ='id';
    protected $table='detail_penerimaan_barang';
    protected $fillable = array('no_penerimaan','kd_barang','jumlah_penerimaan');

   public function relasi_penerimaan()
    {
    	return $this->belongsTo('App\PenerimaanModel');
    }
}
