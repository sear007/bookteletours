<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $appends = array('feature_image');

    public function getFeatureImageAttribute(){
        $path = 'https://teleupload.utebi.com/public/province_photo/';
        return $path.$this->photo;
    }
}
