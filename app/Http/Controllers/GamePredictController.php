<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\GamePredict;

class GamePredictController extends Controller
{
    public function game_predict(Room $room)
    {
       // dd($room);]
        $id = $room->id;
        
        $room = Room::find($id);
        
        $total0 = GamePredict::where('room_id', $id)->where('choice', 0)->count();
        
        $total1 = GamePredict::where('room_id', $id)->where('choice', 1)->count();
      
        return view('/rooms/game_predict')->with(['room' => $room, 'total0' => $total0, 'total1' => $total1]);
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
    public function back()
    {
        
    }
}
