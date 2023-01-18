<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_predict extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongTo(User::class);
    }
    public function room(){
        return $this->belongTo(Room::class);
    }
}
