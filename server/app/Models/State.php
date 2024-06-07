<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public  function orders()
    {
        return $this->belongsTo(Order::class,'state_id');
    }
}
