<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pharmacyLocations()
    {
        return $this->hasMany(PharmacyLocation::class);
    }
}
