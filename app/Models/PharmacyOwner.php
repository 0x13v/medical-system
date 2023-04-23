<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'password',
        'national_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pharmacyLocations()
    {
        return $this->hasMany(PharmacyLocation::class);
    }
}
