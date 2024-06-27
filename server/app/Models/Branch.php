<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $primaryKey = 'branch_id';

    public function orders()
    {
        return $this->hasMany(Order::class,'branch_id');
    }

    public function branchMessages()
    {
        return $this->hasMany(BranchMessage::class,'branch_id');
    }
    
    public function branch_states()
    {
        return $this->belongsTo(BranchState::class,'branch_state_id');
    }
} 
