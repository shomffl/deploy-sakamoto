<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    
    public function chats()
    {
        return $this->hasmany(Chat::class);
    }
    public function game_predicts()
    {
        return $this->hasmany(Game_predict::class);
    }
    public function users()
    {
        return $this->belongToMany(User::class);
    }
}
