<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\Room;
use App\Models\User;

class ChatController extends Controller
{
    
    //public function exestore(Request $request, Room $room)
    //{
        //$chats = new Chat;
        //$form = $request->all();
        //$chats->fill($form)->save();
        //$chat->fill([$chat->body => $request->body,
          //           $chat->user_identifier => $request->user_identifier,                  
            //         $chat->user_id => $request->user_id])->save();
        //$chat = Chat::all();
        //$chat->body = $request->body;
        //$chat->user_identifier = $request->user_identifier;
        //$chat->user_id = $request->user_id;
        //$chat->save();
        
        //return redirect('/chat/' . $room->id );
    //
    //}
    public function chat(Room $room, User $user)
    {
        $length = Chat::all()->count();

        $display = 8;

        $chats = Chat::offset($length-$display)->limit($display)->get();
        
        return view('rooms/chat')->with(['room' => $room,'chats' => $chats, 'user' => $user]);
    }
    
    public function exeStore(Request $request, Chat $chat, Room $room)
    {
        //$input = Chat::where('user_id', \Auth::user()->id)->get();
        //$input = $request['chat'];
        //$chat->fill($input)->save();
        //return back();
     
        //return redirect('/chat/' . $chat->room->id);
     
        
        //$input = $request['chat'];
        
        //$input += ["user_id" => Auth::id()];
        
        //$chat->fill($input)->save();
        
        $chat = new Chat;
        
        $chat->user_id = auth()->id();
        
        $chat->room_id = $request['chat']['room_id'];
        
        $chat->body = $request['chat']['body'];
        
        //$chat = Chat::where('room_id', '2')->get();
        
        //dd($chat);
        
        $chat->save();
        
        return back();
    
        
    }
}
