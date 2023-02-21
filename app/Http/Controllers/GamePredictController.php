<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Chat;
use App\Models\GamePredict;
use Illuminate\Support\Facades\DB;

class GamePredictController extends Controller
{
    //試合結果予想画面の表示
    public function game_predict(Room $room, Chat $chat)
    {
        //room_idの取得
        $id = $room->id;
        //試合結果予想数の取得
        $total0 = GamePredict::where('room_id', $id)->where('choice', 0)->count();
         
        $total1 = GamePredict::where('room_id', $id)->where('choice', 1)->count();
         
        $chats = Chat::where('room_id',$id);
         
        $chats->user_id = auth()->id();
        
            //試合結果予想をしているか否か
            if(isset($room->game_predicts->where('room_id',$room->id)->where('user_id',$chats->user_id)->first()->choice)){
                $choice = $room->game_predicts->where('room_id',$room->id)->where('user_id',$chats->user_id)->first()->choice;
            }else{
                $choice = null;
            }
        
        return view('/rooms/game_predict')->with(['room' => $room, 'total0' => $total0, 'total1' => $total1, 'chats' => $chats, 'game_predicts' => $room->game_predicts, 'choice' => $choice]);
    }    
    //FirstBenchTeamに投票されたときの処理
    public function voteToFirstBenchTeam(Request $request, Room $room)
    {
        //インスタンス化
        $gamepredict = new GamePredict;
       
        $gamepredict->choice = 0;
       
        $gamepredict->user_id = auth()->id();
       
        $gamepredict->room_id = $request['game_predict']['room_id'];
       
        $gamepredict->save();
       
        return back();
       
    }
    //ThirdBenchTeamに投票されたときの処理
    public function voteToThirdBenchTeam(Request $request, Room $room)
    {
        //インスタンス化
        $gamepredict = new GamePredict;
       
        $gamepredict->choice = 1;
       
        $gamepredict->user_id = auth()->id();
       
        $gamepredict->room_id = $request['game_predict']['room_id'];
       
        $gamepredict->save();
        
        return back();
    }
}
