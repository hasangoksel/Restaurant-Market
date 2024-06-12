<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $primaryKey = 'type_id';

    protected $fillable = [
        'type'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class,'type_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'type_id');
    }
}
