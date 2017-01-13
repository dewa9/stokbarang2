<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PenerimaanRequest;
use App\Http\Requests\detail_penerimaanRequest;
use App\MasterBarang;
use App\Penerimaan;
use App\DetailPenerimaan;
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

    public function temp_store(detail_penerimaanRequest $request)
    {
        return response()->json(['return'=>1,'idx'=>$request->input('rowIdx')]);

    }

    public function store(Request $request)
    {
        $action_insert_detail='';
        $stat=0;
        $allItemPenerimaan=$request->get('allItemPenerimaan');
        $decode_Item=(json_decode($allItemPenerimaan));
        if(count($decode_Item)>0){
            $action = Penerimaan::create([
                'tanggal_penerimaan'=>$request->get('tanggal_penerimaan')
            ]);
            for($i=0;$i<count($decode_Item);$i++)
            {
                 $action_insert_detail = DetailPenerimaan::create([
                    'penerimaan_id'=>$action->id,
                    'kd_barang'=>$decode_Item[$i]->id,
                    'jumlah_penerimaan'=>$decode_Item[$i]->jumlah_barang
                ]);
            }
            if($action_insert_detail)
            {
                $stat=1;
            }
        }
        return response()->json(['return'=>$stat]);
    }

    public function getData()
    {
         $getData = DetailPenerimaan::with(['relasi_penerimaan'=>function($query){
            $query->select('id','tanggal_penerimaan');
         },'relasi_master'=>function($queryget){
            $queryget->select('id','nama_barang');
         }])->select();
          return Datatables::of($getData)->make(true);
    }

    public function testGetData(){
        
         $getData = DetailPenerimaan::with(['relasi_penerimaan','relasi_master'])->select();
          return Datatables::of($getData)->make(true);
    }
}
