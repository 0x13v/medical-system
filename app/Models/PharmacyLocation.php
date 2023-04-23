<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'priority'
    ];

    public function pharmacyOwner()
    {
        return $this->belongsTo(PharmacyOwner::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class);
    }
}
