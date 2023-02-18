<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Chat;
use App\Models\Game_predict;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomController extends Controller
{
    use SoftDeletes;
    
    public function front(Request $request, Room $room)
    {
        
        $keyword = $request->input('keyword');
        
        //$query = Room::query();
    
        
        if(!empty($keyword)){
            $result = $room->getPaginateByResult($keyword, 10);
        }else{ 
            $result = $room->getPaginateByLimit(10);
            
        }        
        
        //$room = $query->getPaginateByLimit(10);
        
        //$room->getPaginateByLimit(10);
         
        return view('rooms/front')->with(['rooms' => $result , 'keyword' => $keyword]);
    }
    //public function search(Request $request)
    //{
        //$search_room = '%' . addcslashes($request->search_room, '%_\\') . '%';
        
        //$room = Room::where('title', 'LIKE', $search_room)->orderBy('created_at', 'desc')->Paginate(10);
        
        //return view('rooms/front')->with(['rooms' => $room]);
    //}
    public function create(Room $room)
    {
        return view('rooms/create')->with(['room' => $room]);
    }
    public function store(RoomRequest $request, Room $room)
    {
        //$input = $request['room'];
        //$room->fill($input)->save();
        
        $input = new Room;
        
        $input->title = $request['room']['title'];
        
        $input->comment = $request['room']['comment'];
        
        $input->room_creator_name = auth()->user()->name;
        
        $input->category = $request['room']['category'];
        
        $input->first_bench_team = $request['room']['first_bench_team'];
        
        $input->third_bench_team = $request['room']['third_bench_team'];
        
        $input->save();
        
        dd($input);
        
        return redirect('/chat/' . $room->id);
    }
    public function room_info(Room $room)
    {
        return view('rooms/room_info')->with(['room' => $room]);
    }
    public function chat(Room $room)
    {
        //チャット表示件数制限処理
        $id = $room->id;
        
        //$length = Chat::where('room_id', $id)->count();

        //$display = 8;
        
        $chats = Chat::where('room_id', $id)->get();
        
        //$user_id = auth()->id();
        
        
        
        
        
        
        //$user_id = $user->id
        
        //$game_prediction = Game_predict::where('room_id', $id)->where('user_id', $user_id)->get();
        
        //$game_prediction = new Game_predict;
        
        //$game_prediction->user_id = auth()->id();
        
        //$game_prediction->room_id = $id;
        
        
        //$game_prediction->choice = 1;
        //dd($game_prediction);
        //$user_id = new Room_User;
         
        //$number = Room::find($room->id)->users()->count();
        //dd($number);
        
        return view('rooms/chat')->with(['room' => $room,'chats' => $chats,'game_predicts' => $room->game_predicts]);
    }
    public function edit(Room $room)
    {
        return view('rooms/edit')->with(['room' => $room]);
    }
    public function delete(Room $room)
    {
        $room->delete();
        return redirect('/');
    }
    public function update(RoomRequest $request, Room $room)
    {
        $input_room = $request['room'];
        $room->fill($input_room)->save();
        
        return redirect('/chat/'.$room->id);
    }
    //public function delete(Room $room)
    //{
      //  $room->delete();
      //    return redirect('/');
    //}
    //public function exestore(Request $request, Chat $chat)
    //{
        //$chats = $request[chat];
        //$chat->fill($chats)->save();
        //$chat = Chat::all();
        //$chat->body = $request->body;
        //$chat->user_identifier = $request->user_identifier;
        //$chat->user_id = $request->user_id;
        //$chat->save();
        
        //return back();
    //}
}
