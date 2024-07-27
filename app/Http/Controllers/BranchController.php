<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\RoomType;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        $room_id = request('roomTypeId');
        $provindeId = request('province');
        $roomTypes = RoomType::orderBy('name', 'asc')
            ->whereIsActive(1)
            ->select('id', 'branch_id', 'name')
            ->groupBy('name')
            ->get();
        $branch = Branch::activeRooms()
            ->when($room_id, function($query)use($room_id){
                $query->whereHas('rooms', function($query) use ($room_id){
                    return $query->whereId($room_id);
                });
            })
            ->when($provindeId, function($query)use($provindeId){
                $query->whereProvinceId($provindeId);
            })
            ->orderBy('id','desc')
            ->paginate(8);
		return view('pages.branch.index', [
            'branch' => $branch,
            'roomTypes' => $roomTypes
        ]);
    }

    public function show($id){
        $branch = Branch::activeRooms()->whereId($id)->first();
        return view('pages.branch.show', [
            'branch' => $branch
        ]);
    }

    public function room($branch_name, $branch_id, $room_id){
        $room = RoomType::with('branch')->find($room_id);
        return view('pages.branch.room', compact('room'));
    }
}
