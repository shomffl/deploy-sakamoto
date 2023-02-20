<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\Room;
use App\Models\User;
use App\Models\GamePredict;
use App\Http\Requests\ChatRequest;
use App\Events\MessageSent;


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
    
    public function sendMessage(Request $request, Chat $chat, Room $room, GamePredict $gamePredict)
    {
        
        //チャット同期処理
        
        //$chat = new Chat;
        
        //$chat->user_id = auth()->id();
        
        //$chat->room_id = $request['chat']['room_id'];
        
        //$chat->body = $request['chat']['body'];
        
        //$chat->save();
        
        //return back();
    
        //チャット非同期処理
        
        //
        
        $chat = new Chat;
        
        $chat->user_id = auth()->id();
        
        $chat->room_id = $request[ 'room_id' ];
        
        $chat->body = $request[ 'message' ];
        
        $chat->save();
      
        
        $gamePredict = GamePredict::all();

        
        //if(isset($room->game_predicts->where('room_id',$room->id)->where('user_id',$chat->user_id)->first()->choice)){
          //  $choice = $room->game_predicts->where('room_id',$room->id)->where('user_id',$chat->user_id)->first()->choice;
        //}else{
          //  $choice = null;
        //}
        
        if(isset($gamePredict->where('room_id',$chat->room_id)->where('user_id',$chat->user_id)->first()->choice)){
            if($gamePredict->where('room_id',$chat->room_id)->where('user_id',$chat->user_id)->first()->choice === 0){
                $choice = Room::where('id',$chat->room_id)->first()->first_bench_team;
            }else{
                $choice = Room::where('id',$chat->room_id)->first()->third_bench_team;
            }
        }else{
            $choice = "予想はまだありません";
        }
            
        
        MessageSent::dispatch($chat,$choice);
    
        
        return back();
        
        
        //失敗
        
        //$user = auth()->user();
        
        //$strUsername = $user->name;
        
        //$strmessage = $request->input('message');
        
        //$message = new Message;
        
        //$message->username = $strUsername;
        
        //$message->body = $strMessage;
        
        //MessageSent::dispatch($message);
        
        //return $request;
    }
}
