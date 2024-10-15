<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  use HasFactory;
  protected $guarded = [];
  protected $appends = array('feature_image', 'photos');
  public function rooms()
  {
    return $this->hasMany(RoomType::class);
  }

  public function scopeIsPopular($query)
  {
    return $query->whereBranchTypeId(1)
      ->whereIsActive(1)
      ->where('is_popular', 1);
  }

  public function scopeActiveRooms($query)
  {
    return $query->whereBranchTypeId(1)
      ->whereIsActive(1)
      ->whereIsPublish(1)
      ->whereHas('rooms')
      ->with('location')
      ->with('rooms', function ($query) {
        $query->where('is_active', 1);
      });
  }

  public function scopeActiveSites($query)
  {
    return $query->whereBranchTypeId(2)
      ->whereIsPublish(1)
      ->whereIsActive(1);
  }

  public function getPhotosAttribute()
  {
    $path = 'https://teleupload.utebi.com/public/branch_photo/';
    $data = $this->photos()->get();
    $images = [];
    foreach ($data as $key => $image) {
      $images[$key] = $path . $image->filename;
    }
    return $images;
  }
  public function photos()
  {
    return $this->hasMany(BranchImage::class);
  }

  public function getFeatureImageAttribute()
  {
    $path = 'https://teleupload.utebi.com/public/branch_photo/';
    return $path . $this->photo;
  }

  public function location()
  {
    return $this->belongsTo(Location::class, 'province_id');
  }


  public function tourTypes()
  {
    return $this->hasMany(TourType::class)->select([
      'id',
      'branch_id',
      'tour_package_id',
      'tour_service',
      'name',
      'name_kh',
      'short_description',
      'short_description_kh',
      'term_condition',
      'term_condition_kh'
    ])
    ->with(['tourTypeImages', 'tourPackage'])
    ->whereHas('tourTypeImages');
  }
  
  public function scopeTourDetail(Builder $builder, $branchId)
  {
    return $this->select(['id', 'name', 'name_other','photo', 'long', 'lat', 'address', 'short_description'])
      ->with('withTourTypes')
      ->find($branchId);
  }

  public function scopeTourService(Builder $query, $tourService)
  {
    return $query->whereHas('tourTypes', function ($q) use ($tourService) {
      $q->where('tour_service', $tourService);
    });
  }

  public function withTourTypes()
  {
    return $this->tourTypes()
      ->select([
        'id',
        'branch_id',
        'tour_package_id',
        'tour_service',
        'name',
        'name_kh',
        'short_description',
        'short_description_kh',
        'term_condition',
        'term_condition_kh'
      ])
      ->with(['tourTypeImages', 'tourPackage'])
      ->whereHas('tourTypeImages');
  }
}
