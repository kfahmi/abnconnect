<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Param;

class ParamController extends Controller
{
   
    public function index()
    {
    	$paginationEnabled = config('app.pagination.enable');
        if ($paginationEnabled) {
    		$params = Param::paginate(config('app.pagination.default'));
        } else {
            $params = Param::all();
        }
        return view('param.index',compact('params'));
    }
}
