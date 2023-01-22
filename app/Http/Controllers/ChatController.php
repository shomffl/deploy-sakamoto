<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $display = 15;

        $chats = Chat::offset($length-$display)->limit($display)->get();
        
        return view('posts/chat')->with(['room' => $room,'chats' => $chats, 'user' => $user ]);
    }
    
    public function exeStore(Request $request, Chat $chat)
    {
        //$input = Chat::where('user_id', \Auth::user()->id)->get();
        $input = $request['chat'];
        $chat->fill($input)->save();
        return redirect('/chat/' . $chat->room_id);
    }
}
