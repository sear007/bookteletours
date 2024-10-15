<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTour extends Model
{
  use HasFactory;
  protected $guarded = [];
  const CREATED_AT = 'created';
  const UPDATED_AT = 'modified';
  protected $casts = [
    'hashData' => 'array',
  ];

  public function branch()
  {
    return $this->belongsTo(Branch::class, 'branch_id');
  }
  public function tour()
  {
    return $this->belongsTo(Branch::class, 'branch_id');
  }
  public function tourType()
  {
    return $this->belongsTo(TourType::class);
  }
  public function scopeInformation($query, $tranId = null)
  {
    $result = $query->with(['branch', 'tourType']);
    if ($tranId) {
      return $result->whereTranId($tranId);
    }
    return $result;
  }
}
