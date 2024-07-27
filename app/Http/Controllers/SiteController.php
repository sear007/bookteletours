<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $provindeId = request('province');
        $sites = Branch::activeSites()
            ->orderBy('id','desc')
            ->whereBranchTypeId(2)
            ->when($provindeId, function($query)use($provindeId){
                $query->whereProvinceId($provindeId);
            })
            ->paginate(8);
        return view('pages.sites.index', compact('sites'));
    }

    public function show($id){
        $site = Branch::find($id);
        return view('pages.sites.show', compact('site'));
    }
}
