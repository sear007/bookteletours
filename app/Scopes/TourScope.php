<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TourScope implements Scope
{
  public function apply(Builder $builder, Model $model)
  {
    $builder
    ->select([
      'id',
      'name',
      'name_other',
      'long',
      'lat',
      'address',
      'short_description',
      'short_description_kh',
      'province_id',
      'photo',
    ])
    ->where('branch_type_id', 3);
  }
}
