<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'sCartNumber',
        'user_adress_id',
        'user_id',
        'branch_id',
        'state_id',
        'estimatedDeliveryTime'
    ];

    public  function userAdresses()
    {
        return $this->belongsTo(UserAddress::class,'user_address_id');
    }

    public  function states()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
