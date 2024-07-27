<?php

namespace App\Models;

use App\Scopes\TourScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
  use HasFactory;

  protected $table = 'branches';
  const CREATED_AT = 'created';
  const UPDATED_AT = 'modified';

  public function tourTypes()
  {
    return $this->hasMany(TourType::class, 'branch_id', 'id')->select([
      'id',
      'branch_id',
      'name',
      'name_kh',
      'price_solo',
      'price_group',
      'description',
      'description_kh',
      'short_description',
      'short_description_kh',
      'term_condition',
      'term_condition_kh',
      'tour_includes',
      'tour_includes_kh',
    ])
      ->with(['featureImage', 'tourTypeImages']);
  }

  public function location()
  {
    return $this->belongsTo(Location::class, 'province_id')
      ->select(['name', 'id']);
  }

  public function featureImage()
  {
    return $this->hasOne(BranchImage::class, 'branch_id')
      ->select(['filename', 'branch_id']);
  }

  public function tourImages()
  {
    return $this->hasMany(BranchImage::class, 'branch_id')
      ->select(['filename', 'branch_id']);
  }

  protected static function booted()
  {
    static::addGlobalScope(new TourScope);
  }
}
