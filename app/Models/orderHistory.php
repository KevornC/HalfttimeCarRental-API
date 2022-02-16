<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderHistory extends Model
{
    use HasFactory;

    Protected $fillable=[
        'orderID',
        'totalCost',
        'date'
    ];
    public function order(){
        return $this->belongsTo(order::class,'orderID');
    }
}
