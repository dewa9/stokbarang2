<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreSiswa;
use App\MasterSiswaModel;

class MasterSiswaController extends Controller
{
    //
    public function index()
    {

    }

    public function store(RequestStoreSiswa $request)
    {
        $stat=0;
    	$action = MasterSiswaModel::create([
    			'nis'=>$request->input('nis'),
    			'nama'=>$request->input('nama'),
    			'alamat'=>$request->input('alamat')
    		]);
        if($action){
            $stat=1;
        }
    	return response()->json(['return'=>$stat]);
    }
}
