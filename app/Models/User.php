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

    protected $fillable = [
        'name',
        'email',
        'gender',
        'password',
        'date_of_birth',
        'image',
        'phone_number',
        'national_id',
        'area_id',
        'street_name',
        'building_number',
        'floor_number',
        'flat_number',
        'is_main'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function pharmacyOwner()
    {
        return $this->hasOne(PharmacyOwner::class);
    }

    public function isAdmin()
    {
        return $this->is_main == true;
    }
}
