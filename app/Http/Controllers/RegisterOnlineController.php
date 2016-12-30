<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterOnlineController extends Controller
{
    //
    public function add()
    {
    	$arragama = array();
	 	$arragama[''] 			= 'Pilih';
	 	$arragama['Islam'] 		= 'Islam';
	 	$arragama['Katholik'] 	= 'Katholik';
	 	$arragama['Protestan'] 	= 'Protestan';
	 	$arragama['Hindu'] 		= 'Hindu';
	 	$arragama['Budha']		= 'Budha';
    	return view('register_online.register_online',['arragama'=>$arragama]);
    }

    public function store()
    {
    	
    }
}
