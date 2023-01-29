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
      
        return view('/rooms/game_predict')->with(['room' => $room]);
    }
    public function vote0(Request $request)
    {
       $gamepredict = new Game_predict;
       
       $gamepredict->choice = 0;
       
       $gamepredict->user_id = auth()->id();
       
       //$gamepredict->room_id = $request['game_predict']['room_id'];
       
       dd($gamepredict);
       return redirect('/');
    }
    public function vote1()
    {
       dd($gamepredict);
       return redirect('/');
    }
}
