<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchMessage extends Model
{
    use HasFactory;

    protected $primaryKey = 'branch_message_id';

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

}
