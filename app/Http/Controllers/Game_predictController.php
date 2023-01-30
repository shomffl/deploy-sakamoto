<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Game_predict;

class Game_predictController extends Controller
{
    public function game_predict(Room $room)
    {
       // dd($room);]
        $id = $room->id;
        
        $room = Room::find($id);
        
        $total0 = Game_predict::where('room_id', $id)->where('choice', 0)->count();
        
        $total1 = Game_predict::where('room_id', $id)->where('choice', 1)->count();
      
        return view('/rooms/game_predict')->with(['room' => $room, 'total0' => $total0, 'total1' => $total1]);
    }
    public function vote0(Request $request, Room $room)
    {
       $gamepredict = new Game_predict;
       
       $gamepredict->choice = 0;
       
       $gamepredict->user_id = auth()->id();
       
       $gamepredict->room_id = $request['game_predict']['room_id'];
       
       $gamepredict->save();
       
       //$total = Game_predict::where('choice', 0)->count();
       
       return redirect('/chat/' . $gamepredict->room_id);
       
    }
    public function vote1(Request $request, Room $room)
    {
       $gamepredict = new Game_predict;
       
       $gamepredict->choice = 1;
       
       $gamepredict->user_id = auth()->id();
       
       $gamepredict->room_id = $request['game_predict']['room_id'];
       
       $gamepredict->save();
       
       //$total = Game_predict::where('choice', 0)->count();
       
       return redirect('/chat/' . $gamepredict->room_id);
    }
}
