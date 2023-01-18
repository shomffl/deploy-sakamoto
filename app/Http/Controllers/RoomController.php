<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function front(Room $room)
    {
        return view('posts/front')->with(['rooms' => $room->get()]);
    }
    public function create()
    {
        return view('posts/create');
    }
    public function room_info(Room $room)
    {
        return view('posts/room_info')->with(['room' => $room]);
    }
}
