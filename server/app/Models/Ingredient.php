<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $primaryKey = 'ingredient_id';

    public function languages()
    {
        return $this->belongsTo(Language::class,'language_id');
    }

    public function ingredients_product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_ingredients', 'ingredient_id', 'product_id');
    }
}
