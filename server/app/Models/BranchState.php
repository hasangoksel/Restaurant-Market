<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchState extends Model
{
    use HasFactory;

    protected $primaryKey = 'branch_state_id';

    public function branches()
    {
        return $this->hasMany(Branch::class,'branch_state_id');
    }

    public function languages()
    {
        return $this->belongsTo(Language::class,'language_id');
    }}
