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
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    public function getPaginateByResult($search, int $limit_count = 10)
    {
        return $this->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('first_bench_team', 'LIKE', "%{$search}%")
                  ->orWhere('third_bench_team', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%")
                  ->orderBy('created_at', 'DESC')
                  ->paginate($limit_count);
    }
    public function chats()
    {
        return $this->hasmany(Chat::class);
    }
    public function game_predicts()
    {
        return $this->hasmany(GamePredict::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
