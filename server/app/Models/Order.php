<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'sCartNumber'
    ];

    public  function userAdresses()
    {
        return $this->belongsTo(UserAddress::class,'user_address_id');
    }

    public  function states()
    {
        return $this->belongsTo(State::class,'state_id');
    }
}
