<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'password',
        'national_id',
        'image',
        'is_banned'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
