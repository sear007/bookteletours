<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $casts = [
        'hashData' => 'array',
    ];
    protected $appends = array('qauntity');
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }
    public function getQauntityAttribute(){
        return 1;
    }
    public function scopeInformation($query, $tranId = null){
        $result = $query->with(['branch', 'roomType'])
            ->whereUserAppId(auth()->user()->id);
        if($tranId){
            return $result->whereTranId($tranId);
        }
        return $result;
    }
    public function scopePending($query){
        return $query->wherePaymentStatus('pending')
            ->whereUserAppId(auth()->user()->id);
    }
    public function scopeApproved($query){
        return $query->wherePaymentStatus('approved')
            ->whereUserAppId(auth()->user()->id);
    }
}
