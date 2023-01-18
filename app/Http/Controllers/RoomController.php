<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function front()
    {
        return view('posts/front');
    }
    public function create()
    {
        return view('posts/create');
    }
    public function room_info()
    {
        return view('posts/room_info');
    }
}
