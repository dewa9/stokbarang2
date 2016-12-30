<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MasterBarangRequest;
use App\MasterBarangModel;
use Datatables;

class MasterBarangController extends Controller
{
    //
    public function add()
    {
    	return view('masterbarang.add');
    }

    public function store(MasterBarangRequest $request)
    {
    		$stat=0;
        	$action = MasterBarangModel::create([
                'kode_barang'=>$request->input('kode_barang'),
                'nama_barang'=>$request->input('nama_barang'),
                'jumlah_barang'=>$request->input('jumlah_barang'),
                'satuan'=>$request->input('satuan'),
                'keterangan'=>$request->input('keterangan'),
            ]);
        if($action){
            $stat=1;
        }
    	return response()->json(['return'=>$stat]);
    }

    public function getData()
    {
        $getData = MasterBarangModel::select(['kode_barang','nama_barang','jumlah_barang','satuan','keterangan']);
        return Datatables::of($getData)->make(true);
    }

    public function show(){
    	return view('masterbarang.show');
    }

    public function edit($id)
    {

        $model=MasterBarangModel::where('kode_barang', '=',$id)->first();
        if(count($model)<=0){
        	return view('masterbarang.edit',array('model'=>$model));
        }
    }
    public function update($id)
    {
    	$action='';
    	$model=MasterBarangModel::where('kode_barang', '=',$id)->first();
        if(count($model)<=0){
        	$model->nama_barang = $request->input('nama_barang');
        	$model->jumlah_barang = $request->input('jumlah_barang');
        	$model->satuan = $request->input('satuan');
        	$model->keterangan = $request->input('keterangan');
            $action=$model->save();
        }
    	if($action){
    		return redirect('/master_barang/show');
    	}
    }

    public function delete(Request $request)
    {
        $stat=0;
        $term = $request->get('id');
        if((MasterBarangModel::destroy($term)))
        {
            $stat=1;
        }
        return response()->json(['return'=>$stat]);
    }

}
