<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'detail',
        'price',
        'discountRate',
        'image',
        'isFavourite',
        'language_id'
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

    public function languages()
    {
        return $this->belongsTo(Language::class,'language_id');
    }

    public function product_ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredients', 'product_id', 'ingredient_id');
    }
}
