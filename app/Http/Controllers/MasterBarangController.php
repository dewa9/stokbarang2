<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MasterBarangRequest;
use App\MasterBarang;
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
        	$action = MasterBarang::create([
                'id'=>$request->input('kode_barang'),
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
        $getData = MasterBarang::select(['id','nama_barang','jumlah_barang','satuan','keterangan']);
        return Datatables::of($getData)->make(true);
    }

    public function show(){
    	return view('masterbarang.show');
    }

    public function edit($id)
    {
		if($id!=0){
			$model=MasterBarang::where('id', '=',$id)->firstOrFail();
			return view('masterbarang.edit',array('model'=>$model));
			
		}else
		{
			return redirect('/error/');
		}
    }
    public function update(Request $request,$id)
    {
    	//$action='';
    	$action=MasterBarang::where('id', '=',$id)->update(['nama_barang'=>$request->input('nama_barang'),'jumlah_barang'=>$request->input('jumlah_barang'),
		'satuan'=>$request->input('satuan'),'keterangan'=> $request->input('keterangan')]);
        
        	
    
    	if($action){
    		return redirect('/master_barang/show');
    	}
    }

    public function delete(Request $request)
    {
        $stat=0;
        $term = $request->input('id');
		$model=MasterBarang::where('id',$term)->delete();
        if($model)
        {
            $stat=1;
        }
        return response()->json(['return'=>$stat]);
    }

}
