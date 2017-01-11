<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    //
    public $timestamps = false;
    protected $table='penerimaan_barang';
    protected $fillable = array('tanggal_penerimaan');

    public function relasi_detailpenerimaan()
    {
    	return $this->hasMany('App\DetailPenerimaan');
    }
}
