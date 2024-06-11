<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_address_id';
    
    protected $table='user_addresses';
    protected $fillable=['user_id','address_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'user_address_id');
    }
}
