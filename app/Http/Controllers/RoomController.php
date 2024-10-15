<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class RoomController extends Controller
{
	public function index(){
        $room_id = request('roomTypeId');
        $roomTypes = RoomType::orderBy('name', 'asc')
            ->select('id', 'branch_id', 'name')
            ->groupBy('name')
            ->get();
        $branch = Branch::with(['rooms'])
            ->when($room_id, function($query)use($room_id){
                $query->whereHas('rooms', function($query) use ($room_id){
                    return $query->whereId($room_id);
                });
            })
            ->whereBranchTypeId(1)
            ->whereHas('rooms')
            ->paginate(4); 
		return view('branch.index', [
            'branch' => $branch,
            'roomTypes' => $roomTypes
        ]);
	}
	public function show($id){
        $branch = Branch::with(['rooms'])->whereId($id)->first();
        return view('branch.show', [
            'branch' => $branch
        ]);
    }
}
