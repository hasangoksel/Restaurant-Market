<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSCart extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_s_cart_id';

    protected $fillable = [
        'user_id',
        'sCartNumber'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
