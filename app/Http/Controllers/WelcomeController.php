<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Province;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
	{
		$turism = DB::table('branches')->select('*')->where('branch_type_id','=','2')->take(4)->get();
		$sites = Branch::orderBy('id','desc')
			->whereBranchTypeId(2)
			->take(4)
			->get();
		$hotels = Branch::isPopular()
			->orderBy('id','desc')
			->take(4)
			->get(); 
		$guest_house = Branch::orderBy('id','desc')
			->whereHas('rooms')
			->whereBranchTypeId(1)
			->whereIsActive(1)
			->take(4)
			->get();
		return view('welcome')->with(compact('sites','guest_house', 'hotels'));
	}
}
