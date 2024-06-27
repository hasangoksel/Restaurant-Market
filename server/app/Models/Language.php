<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $primaryKey = 'language_id';

    public function states()
    {
        return $this->hasMany(State::class,'language_id');
    }

    public function branch_states()
    {
        return $this->hasMany(BranchState::class,'language_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class,'language_id');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class,'language_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'language_id');
    }
}
