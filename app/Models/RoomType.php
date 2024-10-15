<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $appends = array(
        'feature_image',
        'photos'
    );
    public function image(){
        return $this->hasOne(RoomTypeImage::class);    
    }
    public function getFeatureImageAttribute()
    {
        $path = 'https://teleupload.utebi.com/public/room_type_photo/';
        if($this->image){
            return $path.$this->image->filename; 
        } 
        return '';
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function photos(){
        return $this->hasMany(RoomTypeImage::class);
    }

    public function getPhotosAttribute(){
        $path = 'https://teleupload.utebi.com/public/room_type_photo/';
        $data = $this->photos()->get();
        $images = [];
        foreach($data as $key => $image){
            $images[$key] = $path.$image->filename;
        }
        return $images;
    }
}
