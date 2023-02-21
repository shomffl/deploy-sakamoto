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
    //チャット画面表示の処理
    public function chat(Room $room, User $user)
    {
        $length = Chat::all()->count();

        $display = 8;

        $chats = Chat::offset($length-$display)->limit($display)->get();
        
        return view('rooms/chat')->with(['room' => $room,'chats' => $chats, 'user' => $user]);
    }
    
    //チャット入力の処理
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
        
        //インスタンス化
        $chat = new Chat;
        
        $chat->user_id = auth()->id();

        $chat->room_id = $request[ 'room_id' ];
        
        $chat->body = $request[ 'message' ];
        
        $chat->save();
      
      
      
        //試合結果予想情報の取得
        $gamePredict = GamePredict::all();
        
              if(isset($gamePredict->where('room_id',$chat->room_id)->where('user_id',$chat->user_id)->first()->choice)){
                  if($gamePredict->where('room_id',$chat->room_id)->where('user_id',$chat->user_id)->first()->choice == 1){
                      $choice = Room::where('id',$chat->room_id)->first()->third_bench_team;
                  }else{
                      $choice = Room::where('id',$chat->room_id)->first()->first_bench_team;
                  }
              }else{
                  $choice = "予想はまだありません";
              }
        
        //MessageSent.phpに$chatと$choiceを渡す
        MessageSent::dispatch($chat,$choice);
    
        
        return back();
        

    }
}
