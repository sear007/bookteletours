<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];
    protected $table = 'user_apps';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $appends = array('name');
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getNameAttribute()
    {
        return $this->first_name;  
    }
    public function reservation(){
        return $this->hasMany(Reservation::class, 'user_app_id');
    }
}
