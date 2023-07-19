<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function futsalTimings()
    {
        return $this->belongsTo(Futsal_timing::class);
    }
}
