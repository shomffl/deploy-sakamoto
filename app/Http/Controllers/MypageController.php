<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Chat;
use App\Models\Mypage;

class MypageController extends Controller
{
    public function mypage(Chat $chat)
    {
        //ユーザーのIDを取得
        $user_id = auth()->id();
        
        //取得したユーザーのチャット情報をすべて取得
        $mychats = $chat->where('user_id', $user_id)->get();
        
        $room_id = array();
        //チャット情報のidをそれぞれ取得
        foreach ($mychats as $mychat){
           array_push($room_id, $mychat->room_id);
        }
        //dump($room_id);
        //取得したチャットIDのチャット情報をすべて取得（これができない）
        
        //dd($room->first()->chats->where('user_id', $user_id)->all());
        //dd($room->chat->where('user_id', auth()->id()));
       // if(isset($room->chat->where('user_id', auth()->id())->all()))
     //  {
     //       $myrooms = $room->chat->where('user_id', auth()->id());
      //  }else{
          //  $myrooms = null;
        //}
     
        $myrooms = Room::whereIn('id',$room_id)->orderBy('created_at', 'DESC')->paginate(5);
       
        
        return view('rooms/mypage')->with(['myrooms' => $myrooms]);
    }
}
