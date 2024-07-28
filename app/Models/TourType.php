<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourType extends Model
{
  use HasFactory;

  public function featureImage()
  {
    return $this->hasOne(TourTypeImage::class)->select(['filename', 'tour_type_id']);
  }

  public function tourTypeImages()
  {
    return $this->hasMany(TourTypeImage::class)
      ->select(['filename', 'tour_type_id'])
      ->where('is_active', 1);
  }

  public function tour()
  {
    return $this->belongsTo(Branch::class, 'branch_id')
      ->select(['id', 'name', 'name_other', 'address', 'long', 'lat', 'photo']);
  }
  public function tourTimes()
  {
    return $this->hasMany(TourTypeTime::class)
    ->select(['name', 'tour_type_id', 'id'])
    ->where('is_active', 1);
  }
}
