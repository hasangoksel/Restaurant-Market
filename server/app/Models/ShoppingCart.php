<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $primaryKey = 'shopping_cart_id';

    protected $fillable = [
        'product_id',
        'sCartNumber',
        'detail',
        'count',
        'price',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
