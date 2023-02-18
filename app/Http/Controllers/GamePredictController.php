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
    public function game_predict(Room $room, Chat $chat)
    {
        $id = $room->id;
        
        $total0 = GamePredict::where('room_id', $id)->where('choice', 0)->count();
         
        $total1 = GamePredict::where('room_id', $id)->where('choice', 1)->count();
         
        $chats = Chat::where('room_id',$id);
         
        $chats->user_id = auth()->id();
         
    
        if(isset($room->game_predicts->where('room_id',$room->id)->where('user_id',$chats->user_id)->first()->choice)){
            $choice = $room->game_predicts->where('room_id',$room->id)->where('user_id',$chats->user_id)->first()->choice;
        }else{
            $choice = null;
        }
        
        return view('/rooms/game_predict')->with(['room' => $room, 'total0' => $total0, 'total1' => $total1, 'chats' => $chats, 'game_predicts' => $room->game_predicts, 'choice' => $choice]);
    }    
    public function voteToFirstBenchTeam(Request $request, Room $room)
    {
        $gamepredict = new GamePredict;
       
        $gamepredict->choice = 0;
       
        $gamepredict->user_id = auth()->id();
       
        $gamepredict->room_id = $request['game_predict']['room_id'];
       
        $gamepredict->save();
       
       //$total = Game_predict::where('choice', 0)->count();
       
       //dd($gamepredict);
       
        return back();
       
    }
    public function voteToThirdBenchTeam(Request $request, Room $room)
    {
        $gamepredict = new GamePredict;
       
        $gamepredict->choice = 1;
       
        $gamepredict->user_id = auth()->id();
       
        $gamepredict->room_id = $request['game_predict']['room_id'];
       
        $gamepredict->save();
        
       //$total = Game_predict::where('choice', 0)->count();
         
        return back();
    }
}
