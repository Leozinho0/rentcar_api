<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index(Request $request){
    }

    public function get_cidades(Request $request){
    	$estado_id = $request->estado_id;
    	try{
    		$results = DB::table('cidades')->where('estado_id', '=', $estado_id)->get();
    		return response()->json($results);
    	}catch(\Exception $e){
    		echo $e->getMessage();
    	}
    }
}
