<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    public function Cotisation(){
        return$this->hasMany(Cotisation::class);
    }

    public function user(){
        return$this->belongsTo(user::class);
    }

    public function tontine(){
        return$this->belongsTo(tontine::class);
    }
}
