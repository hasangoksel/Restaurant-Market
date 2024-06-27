<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $primaryKey = 'state_id';

    protected $fillable = [
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'state_id');
    }

    public function languages()
    {
        return $this->belongsTo(Language::class,'language_id');
    }
}
