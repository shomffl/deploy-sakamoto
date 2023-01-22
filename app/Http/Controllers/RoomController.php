<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Chat;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function front(Room $room)
    {
        return view('posts/front')->with(['rooms' => $room->getPaginateByLimit()]);
    }
    public function create(Room $room)
    {
        return view('posts/create')->with(['room' => $room]);
    }
    public function store(Request $request, Room $room)
    {
        $input = $request['room'];
        $room->fill($input)->save();
        return redirect('/chat/' . $room->id);
    }
    public function room_info(Room $room)
    {
        return view('posts/room_info')->with(['room' => $room]);
    }
    public function chat(Room $room, User $user)
    {
        $length = Chat::all()->count();

        $display = 15;

        $chats = Chat::offset($length-$display)->limit($display)->get();
        
        return view('posts/chat')->with(['room' => $room,'chats' => $chats, 'user' => $user ]);
    }
    //public function exestore(Request $request, Chat $chat)
    //{
        //$chats = $request[chat];
        //$chat->fill($chats)->save();
        //$chat = Chat::all();
        //$chat->body = $request->body;
        //$chat->user_identifier = $request->user_identifier;
        //$chat->user_id = $request->user_id;
        //$chat->save();
        
        //return back();
    //}
}
