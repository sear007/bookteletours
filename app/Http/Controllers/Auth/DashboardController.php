<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserDetailJson;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $query = Reservation::information()->orderBy('id', 'desc');
        $totalApproved = Reservation::approved()->count();
        $totalPending = Reservation::pending()->count();
        $reservation = $query->paginate('10');
        $totalSpent = $query->sum('price');
        $totalBooking = $query->count();
        return view('user.index', compact(
            'reservation', 
            'totalBooking',
            'totalSpent',
            'totalApproved',
            'totalPending',
        ));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getuser(){
        $user = auth()->user();
        return new UserDetailJson($user);
    }
}