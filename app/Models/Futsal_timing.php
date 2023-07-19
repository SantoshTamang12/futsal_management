<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Futsal_timing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function futsal()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_id');

    }

}
