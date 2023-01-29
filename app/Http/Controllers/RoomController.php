<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Chat;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function front(Room $room)
    {
        return view('rooms/front')->with(['rooms' => $room->getPaginateByLimit()]);
    }
    //public function search(Request $request)
    //{
        //$search_room = '%' . addcslashes($request->search_room, '%_\\') . '%';
        
        //$room = Room::where('title', 'LIKE', $search_room)->orderBy('created_at', 'desc')->Paginate(10);
        
        //return view('rooms/front')->with(['rooms' => $room]);
    //}
    public function create(Room $room)
    {
        return view('rooms/create')->with(['room' => $room]);
    }
    public function store(Request $request, Room $room)
    {
        $input = $request['room'];
        $room->fill($input)->save();
        return redirect('/chat/' . $room->id);
    }
    public function room_info(Room $room)
    {
        return view('rooms/room_info')->with(['room' => $room]);
    }
    public function chat(Room $room)
    {
        $id = $room->id;
        
        $length = Chat::where('room_id', $id)->count();

        $display = 8;
        
        $chats = Chat::where('room_id', $id)->offset($length-$display)->limit($display)->get();
        
        //$room_id = Auth::room();
        
        return view('rooms/chat')->with(['room' => $room,'chats' => $chats]);
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
