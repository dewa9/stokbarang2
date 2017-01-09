<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PenerimaanRequest;
use App\Http\Requests\detail_penerimaanRequest;
use App\MasterBarangModel;
use App\PenerimaanModel;
use App\Detail_PenerimaanModel;
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
            $action = PenerimaanModel::create([
                'tanggal_penerimaan'=>$request->get('tanggal_penerimaan')
            ]);
            for($i=0;$i<count($decode_Item);$i++)
            {
                 $action_insert_detail = Detail_PenerimaanModel::create([
                    'no_penerimaan'=>$action->id,
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
         $getData = PenerimaanModel::with(['relasi_detailpenerimaan'])->select();
          return Datatables::of($getData)->make(true);
    }
}
