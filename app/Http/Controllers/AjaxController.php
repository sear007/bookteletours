<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getProvinces(Request $request){
        $search = $request->search;
        $provinces = Province::orderBy('name')
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->whereIsActive(1)
                ->limit(5)
                    ->get();
        return $provinces;
    }
}
