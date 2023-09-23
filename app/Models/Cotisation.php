<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;

    public function participation(){
        return$this->belongsTo(participation::class);
    }
}
