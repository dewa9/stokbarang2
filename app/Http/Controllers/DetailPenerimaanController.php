<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DetailPenerimaan;
class DetailPenerimaanController extends Controller
{
    //
	
	public function delete(Request $request)
	{
		$stat=0;
        $term = $request->get('id');
        if((DetailPenerimaan::destroy($term)))
        {
            $stat=1;
        }
        return response()->json(['return'=>$stat]);
	}
}
