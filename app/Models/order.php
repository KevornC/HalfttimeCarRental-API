<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    Protected $fillable=[
    'memberID',
    'vehicleID',
    'startDate',
    'endDate',
    'quantity',
    'status',
    'approvedBy'
    ];

    public function member(){
        return $this->belongsTo(Member::class,'memberID');
    }
    public function vehicle(){
        return $this->belongsTo(vehicle::class,'vehicleID');
    }

    public function orderHistories(){
        return $this->hasMany(order::class,'orderID');
    }

    
}
