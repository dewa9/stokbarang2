<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PenerimaanRequest;
use App\Http\Requests\detail_penerimaanRequest;
use App\MasterBarangModel;
use App\PenerimaanModel;
use Datatables;


class PenerimaanController extends Controller
{
    //
    public function add(){
    	$arrbarang = MasterBarangModel::pluck('nama_barang', 'kode_barang');
    	return view('penerimaanbarang.add',['arrbarang'=>$arrbarang]);
    }

    public function show()
    {
    	return view('penerimaanbarang.show');
    }

    public function store_detail_penerimaan()
    {
    	
    }
}
