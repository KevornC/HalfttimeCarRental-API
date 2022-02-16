<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;

    protected $fillable=[
    'image',
    'name',
    'model',
    'rentalCost',
    'quantity',
    'color',
    'seatingCap',
    'driverType',
    'bin'
    ];

    public function order(){
        return $this->hasMany(order::class,'vehicleID');
    }
}
