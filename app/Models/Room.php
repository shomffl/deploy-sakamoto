<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'comment',
        'first_bench_team',
        'third_bench_team',
    ];
    public function getPaginateByLimit(int $limit_count = 10)
    {
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
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
