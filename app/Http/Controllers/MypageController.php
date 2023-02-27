<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Chat;
use App\Models\Mypage;

class MypageController extends Controller
{
    //マイページを表示するための処理
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
        
        //ペジネーション 
        $myrooms = Room::whereIn('id',$room_id)->orderBy('created_at', 'DESC')->paginate(5);
        
        //ルームの数を取得
        $roomsCount = $mychats->count();
        
        return view('rooms/mypage')->with(['myrooms' => $myrooms, 'roomsCount' => $roomsCount]);
    }
}
