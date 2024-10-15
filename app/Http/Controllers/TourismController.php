<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourismController extends Controller
{
    public function index()
	{
		//
		$tourism = DB::table('branches')->select('*')
						->where('branch_type_id','=','2')
						->where('is_active','=','1')
						->get();
		return  view('tourism.index')->with(compact('tourism'));
	}
}
