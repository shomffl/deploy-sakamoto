<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongTo(User::class);
    }
    public function room()
    {
        return $this->belongTo(Room::class);
    }
}
