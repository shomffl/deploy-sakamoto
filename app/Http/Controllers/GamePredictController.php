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
        
        //試合結果予想数(choiceカラムが0のレコード数)の取得
        $total0 = GamePredict::where('room_id', $id)->where('choice', 0)->count();
         
        //試合結果予想数(choiceカラムが1のレコード数)の取得
        $total1 = GamePredict::where('room_id', $id)->where('choice', 1)->count();
         
        
        
        //chatテーブルから当該のroom_idを取得しそのレコードを代入
        $chats = Chat::where('room_id',$id);
         
        
        $chats->user_id = auth()->id();
        
        
            //試合結果予想をしているか(room_idとuser_idからchoiceカラムに値が入っているか)否かを判定する条件分岐
            if(isset($room->game_predicts->where('room_id',$room->id)->where('user_id',$chats->user_id)->first()->choice)){
                
                $choice = $room->game_predicts->where('room_id',$room->id)->where('user_id',$chats->user_id)->first()->choice;
              
            }else{
                //入っていない場合はnullを代入する
                $choice = null;
            }
            
        
        
        
        return view('/rooms/game_predict')->with(['room' => $room, 'total0' => $total0, 'total1' => $total1, 'chats' => $chats, 'game_predicts' => $room->game_predicts, 'choice' => $choice]);
    }    
    //FirstBenchTeamに投票されたときの処理
    public function voteToFirstBenchTeam(Request $request, Room $room)
    {
        //インスタンス化
        $gamepredict = new GamePredict;
       
        //choiceカラムに１(FirstBenchTeam)を代入
        $gamepredict->choice = 0;
       
        //ユーザーidを取得し代入  
        $gamepredict->user_id = auth()->id();
       
        //ルームidを取得し代入
        $gamepredict->room_id = $request['game_predict']['room_id'];
       
        
        $gamepredict->save();
       
        
        return back();
       
    }
    //ThirdBenchTeamに投票されたときの処理
    public function voteToThirdBenchTeam(Request $request, Room $room)
    {
        //インスタンス化
        $gamepredict = new GamePredict;
        
        //choiceカラムに１(ThirdBenchTeam)を代入
        $gamepredict->choice = 1;
        
        //ユーザーidを取得し代入   
        $gamepredict->user_id = auth()->id();
       
        //ルームidを取得し代入
        $gamepredict->room_id = $request['game_predict']['room_id'];
       
        
        $gamepredict->save();
        
        
        return back();
    }
}
