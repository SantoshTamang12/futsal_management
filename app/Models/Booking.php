<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){

        return $this->belongsTo(User::class, 'customer_id');

    }
    

    public function futsal(){

        return $this->belongsTo(User::class, 'futsal_id');
        
    }

    public function futsal_timing(){

        return $this->belongsTo(Futsal_timing::class, 'futsal_timing_id');
        
    }

}
