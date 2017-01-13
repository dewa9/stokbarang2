<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaanModel extends Model
{
    //
    public $timestamps = false;
    protected $table='penerimaan_barang';
    protected $primaryKey='id';
    protected $fillable = array('tanggal_penerimaan');

    public function relasi_detailpenerimaan()
    {
    	return $this->belongsTo('App\DetailPenerimaan');
    }
    
}
