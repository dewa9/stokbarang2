<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaanModel extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey ='no_penerimaan';
    protected $table='penerimaan_barang';
    protected $fillable = array('tanggal_penerimaan');

    public function relasi_detailpenerimaan()
    {
    	return $this->hasMany('App\Detail_PenerimaanModel');
    }
    
}
