<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $fillable=[
        'fname',
        'lname',
        'gender',
        'address',
        'country',
        'trn',
        'photo',
        'phone',
        'email',
        'password'
    ];

    public function order(){
        return $this->hasMany(order::class,'memberID');
    }
}
