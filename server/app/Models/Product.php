<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'detail',
        'count',
        'price',
        'discountRate',
        'image'
    ];

    public function shopCarts()
    {
        return $this->hasMany(ShoppingCart::class,'product_id');
    }

    public function types()
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
